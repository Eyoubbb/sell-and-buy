<?php

require_once(PATH_CORE.'Connection.php');

abstract class DAO {

	private $debug;
	private $table;
	
	public function __construct($debug, $table) {
		$this->debug = $debug;
		$this->table = $table;
	}

	private function request($sql, $handler, $args = null) {
		try {
			if ($args == null) {
				$stmt = Connection::getInstance()->getBdd()->query($sql);
			} else {
				$stmt = Connection::getInstance()->getBdd()->prepare($sql);
				$stmt->execute($args);
			}
			$stmt->setFetchMode(PDO::FETCH_CLASS, $this->table);
			
			$res = $handler($stmt);

		} catch (PDOException $e) {
			if ($this->debug) {
				die($e->getMessage());
			}
			$res = false;
		}
		return $res;
	}
	
	public function queryRow($sql, $args = null): object | false {
		return $this->request($sql, function ($stmt) {
			$res = $stmt->fetch();
			$stmt->closeCursor();
			return $res;
		}, $args);
	}
	
	public function queryAll($sql, $args = null): array | false {
		return $this->request($sql, function ($stmt) {
			$res = $stmt->fetchAll();
			$stmt->closeCursor();
			return $res;
		}, $args);
	}
	
	public function save($sql, $args = null): string | false {
		return $this->request($sql, fn () => Connection::getInstance()->getBdd()->lastInsertId(), $args);
	}

	public function delete($sql, $args = null): int | false {
		return $this->request($sql, fn ($stmt) => $stmt->rowCount(), $args);
	}

}
