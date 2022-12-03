<?php

require_once 'User.php';

class Creator extends User {

	private string $description;
	private ?string $banner_url;

	public function __construct(?array $row = null) {
		if ($row) {
			parent::__construct($row);
			$this->description = $row['creator_description'];
			$this->banner_url = $row['creator_banner_url'];
		}
	}

	public function getDescription(): string { return $this->description; }

	public function setDescription(string $description): void { $this->description = $description; }

	public function getBannerUrl(): ?string { return $this->banner_url; }

	public function setBannerUrl(string $banner_url): void { $this->banner_url = $banner_url; }
	
}