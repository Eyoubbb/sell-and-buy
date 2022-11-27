<?php

require_once PATH_CORE . 'Model.php';

class CreatorModel extends Model {

    public function ask(): Creator | false {
        
		$description = $_POST['description'];
        $bannerUrl = $_POST['bannerUrl'];

        //$picture = $_FILES['picture'];

        // $resExif = exif_imagetype($picture['tmp_name']);
        // if (!in_array($resExif, [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_WEBP])) {
        //     $this->setError('INVALID_PICTURE');
        //     return false;
        // }
        
        // if ($picture['size'] > 5_000_000) {
        //     $this->setError('PICTURE_TOO_BIG');
        //     return false;
        // }

        $creator = new Creator();
        $creator->setDescription($description);
        //$creator->setBannerUrl($bannerUrl);
        
        
        $userId = $userDAO->insertUser($user);
        
        if ($userId !== false) {
            $user->setId($userId);
            $fileName = "PP-$userId." . pathinfo($picture['name'], PATHINFO_EXTENSION);
            
            if (move_uploaded_file($picture['tmp_name'], PATH_UPLOAD_PROFILE_PICTURES . $fileName)) {
                $user->setPictureUrl($fileName);

                if ($userDAO->updatePictureUrl($user) === false) {
                    $userDAO->rollBack();
                    unlink(PATH_UPLOAD_PROFILE_PICTURES . $fileName);
                    $this->setError('ERROR_UPDATING_PICTURE_URL');
                    return false;
                }

                $userDAO->commit();
                return $user;
            }
            
            $userDAO->rollBack();
            $this->setError('ERROR_UPLOADING_PICTURE');
            return false;
        }

        $userDAO->rollBack();
        $this->setError('UNKNOWN_ERROR');
        return false;
    }    
}
