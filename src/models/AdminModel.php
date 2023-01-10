<?php

require_once PATH_CORE . 'Model.php';
require_once PATH_ENTITIES . 'Admin.php';
require_once PATH_ENTITIES . 'User.php';

class AdminModel extends Model {

	public function contact(): array | false {
		
        $adminDAO = $this->dao('Admin');

        $admins = $adminDAO->getAllAdmins();

        if ($admins === false) {
            $this->setError('ERROR_FETCHING_ADMINS');
            return false;
        }

        return $admins;
	}
}