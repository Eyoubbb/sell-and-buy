<?php

class SocialMedia {

	private int $id;
	private string $name;
	private string $iconUrl;

	public function getId(): int { return $this->id; }

	public function getName(): string { return $this->name; }

	public function getIconUrl(): string { return $this->iconUrl; }
	
}