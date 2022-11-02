<?php

require_once(PATH_CORE.'Connection.php');

abstract class DAO {

	private bool $debug = DEBUG;
	private string $table;
	private string $class;
	
	public function __construct(string $table) {
		$this->table = $table;
		$this->class = substr(get_class($this), 0, -strlen('DAO'));
	}

	public function getTable(): string {
		return $this->table;
	}

	private function request($sql, $handler, $args = null, bool $fetchClass = true) {
		try {
			if ($args == null) {
				$stmt = Connection::getInstance()->getBdd()->query($sql);
			} else {
				$stmt = Connection::getInstance()->getBdd()->prepare($sql);
				$stmt->execute($args);
			}

			if ($fetchClass) {
				$stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
			} else {
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
			}
			
			$res = $handler($stmt);

		} catch (PDOException $e) {
			if ($this->debug) {
				die($e->getMessage());
			}
			$res = false;
		}
		return $res;
	}
	
	public function queryRow($sql, $args = null, bool $fetchClass = true): object | array | false {
		return $this->request($sql, function ($stmt) {
			$res = $stmt->fetch();
			$stmt->closeCursor();
			return $res;
		}, $args, $fetchClass);
	}
	
	public function queryAll($sql, $args = null, bool $fetchClass = true): array | false {
		return $this->request($sql, function ($stmt) {
			$res = $stmt->fetchAll();
			$stmt->closeCursor();
			return $res;
		}, $args, $fetchClass);
	}
	
	public function lastInsertId($sql, $args = null): string | false {
		return $this->request($sql, fn () => Connection::getInstance()->getBdd()->lastInsertId(), $args);
	}

	public function rowCount($sql, $args = null): int | false {
		return $this->request($sql, fn ($stmt) => $stmt->rowCount(), $args);
	}

	/*************** Basic query implementations ***************/

	public function getAll($orderBy = null): array | false {
		$sql = "SELECT * FROM $this->table";

		if ($orderBy != null) {
			$sql .= " ORDER BY $orderBy";
		}

		return $this->queryAll($sql);
	}

	public function getAllByLimitOffsetPagination($page, $nbPerPage, $orderBy = null): array | false {
		$sql = "SELECT * FROM $this->table";

		if ($orderBy != null) {
			$sql .= " ORDER BY $orderBy";
		}

		$sql .= ' LIMIT ' . (($page - 1) * $nbPerPage) . ', ' . $nbPerPage;

		return $this->queryAll($sql);
	}

	/**
	 * The cursor based pagination has better performance than the offset based pagination.
	 * The tradeoff is that it makes it impossible to jump to a specific page.
	 * You can only go to the next page or the previous page.
	 * The column used for the cursor must be unique and sequential.
	 */
	public function getAllByCursorBasedPagination($valueName, $lastValue, $nbPerPage): array | false {
		
		$sql = "SELECT * FROM $this->table WHERE $valueName > $lastValue ORDER BY $valueName LIMIT $nbPerPage";

		return $this->queryAll($sql);
	}

	public function getById($id): object | false {
		return $this->queryRow("SELECT * FROM $this->table WHERE id = ?", [$id]);
	}

	public function insert($data): string | false {
		$keys = array_keys($data);
		$keys = implode(', ', $keys);

		$values = array_values($data);
		$values = implode(', ', array_fill(0, count($values), '?'));

		return $this->lastInsertId("INSERT INTO $this->table ($keys) VALUES ($values)", array_values($data));
	}
	
	public function update($id, $data): int | false {
		$keys = array_keys($data);
		$keys = implode(' = ?, ', $keys) . ' = ?';

		$values = array_values($data);
		$values[] = $id;

		return $this->rowCount("UPDATE $this->table SET $keys WHERE id = ?", $values);
	}

	public function delete($id): int | false {
		return $this->rowCount("DELETE FROM $this->table WHERE id = ?", [$id]);
	}
	
}