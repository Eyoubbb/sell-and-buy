<?php

require_once PATH_CORE . 'DAO.php';
require_once PATH_ENTITIES . 'Category.php';

class CategoryDAO extends DAO {

	public function __construct() {
		parent::__construct('categories');
	}
	
}