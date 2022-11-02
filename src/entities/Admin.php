<?php

require_once 'User.php';

class Admin extends User {
	
	public function __construct(?array $row) {
		if ($row) {
			parent::__construct($row);
		}
	}

}