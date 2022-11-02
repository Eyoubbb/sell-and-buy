<?php

class Comment {

	private int $id;
	private int $ratingId;
	private int $userId;
	private string $title;
	private string $body;

	public function getId(): int { return $this->id; }

	public function getRatingId(): int { return $this->ratingId; }

	public function getUserId(): int { return $this->userId; }

	public function getTitle(): string { return $this->title; }

	public function getBody(): string { return $this->body; }

}