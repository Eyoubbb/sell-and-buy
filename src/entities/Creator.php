<?php

require_once 'User.php';

class Creator extends User {

	private string $description;
	private string $bannerUrl;

	public function getDescription(): string { return $this->description; }

	public function getBannerUrl(): string { return $this->bannerUrl; }
	
}