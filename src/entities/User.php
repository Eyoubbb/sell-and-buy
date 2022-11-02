<?php

class User {

	private int $id;
	private string $first_name;
	private string $last_name;
	private string $password_hash;
	private string $email;
	private string $picture_url;
	
	public function getId(): int { return $this->id; }

	public function getFirstName(): string { return $this->first_name; }

	public function getLastName(): string { return $this->last_name; }

	public function getPasswordHash(): string { return $this->password_hash; }

	public function getEmail(): string { return $this->email; }

	public function getPictureUrl(): string { return $this->picture_url; }
	
}