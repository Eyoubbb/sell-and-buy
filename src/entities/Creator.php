<?php

require_once 'User.php';

class Creator extends User {

	private string $creator_description;
	private ?string $creator_banner_url;

	public function __construct(?array $row = null) {
		if ($row) {
			parent::__construct($row);
			$this->creator_description = $row['creator_description'];
			$this->creator_banner_url = $row['creator_banner_url'];
		}
	}

	public function getDescription(): string { return $this->creator_description; }

	public function setDescription(string $description): void { $this->creator_description = $description; }

	public function getBannerUrl(): ?string { return $this->creator_banner_url; }

	public function setBannerUrl(string $banner_url): void { $this->creator_banner_url = $banner_url; }
	
}