<?php

class User {

	private int $id;
	private string $firstName;
	private string $lastName;
	private string $passwordHash;
	private string $email;
	private string $pictureUrl;
	
	public function getId(): int { return $this->id; }

	public function getFirstName(): string { return $this->firstName; }

	public function getLastName(): string { return $this->lastName; }

	public function getPasswordHash(): string { return $this->passwordHash; }

	public function getEmail(): string { return $this->email; }

	public function getPictureUrl(): string { return $this->pictureUrl; }
	
}