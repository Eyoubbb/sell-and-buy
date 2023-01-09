<?php

require_once PATH_CORE . 'DAO.php';
require_once PATH_ENTITIES . 'User.php';
require_once PATH_ENTITIES . 'Admin.php';

class AdminDAO extends DAO {

	public function __construct() {
		parent::__construct('admins');
	}

    public function getAllAdmins(): array | false {
        $sql = "SELECT * FROM {$this->getTable()} JOIN users ON users.user_id = admins.admin_id";
        return $this->queryAll($sql, [], false);
    }

}