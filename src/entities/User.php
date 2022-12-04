<?php

class User {

	private int $user_id;
	private string $user_first_name;
	private string $user_last_name;
	private string $user_password_hash;
	private string $user_email;
	private ?string $user_picture_url;
	
	public function __construct(?array $row = null) {
		if ($row) {
			$this->user_id = $row['user_id'];
			$this->user_first_name = $row['user_first_name'];
			$this->user_last_name = $row['user_last_name'];
			$this->user_password_hash = $row['user_password_hash'];
			$this->user_email = $row['user_email'];
			$this->user_picture_url = $row['user_picture_url'];
		}
	}
	
	public function getId(): int { return $this->user_id; }

	public function setId(int $id): void { $this->user_id = $id; }

	public function getFirstName(): string { return $this->user_first_name; }

	public function setFirstName(string $first_name): void { $this->user_first_name = $first_name; }

	public function getLastName(): string { return $this->user_last_name; }

	public function setLastName(string $last_name): void { $this->user_last_name = $last_name; }

	public function getPasswordHash(): string { return $this->user_password_hash; }

	public function setPasswordHash(string $password_hash): void { $this->user_password_hash = $password_hash; }

	public function getEmail(): string { return $this->user_email; }

	public function setEmail(string $email): void { $this->user_email = $email; }

	public function getPictureUrl(): ?string { return $this->user_picture_url; }
	
	public function setPictureUrl(string $picture_url): void { $this->user_picture_url = $picture_url; }

}