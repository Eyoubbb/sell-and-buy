<?php

class Model {

	public function dao(string $dao): object {
		
		require_once PATH_DAO . $dao . '.php';

		return new $dao();
	}
	
}