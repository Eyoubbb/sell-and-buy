<?php

require_once PATH_CORE . 'Model.php';

class CreatorModel extends Model {

    public function ask(): Creator | false {
        
		$description = $_POST['description'];
        $bannerUrl = $_POST['bannerUrl'];

        $creator = new Creator();
        $creator->setDescription($description);
        
        
        $userId = $userDAO->insertUser($user);
    }    
}
