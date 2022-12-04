<?php

class Comment {

	private int $comment_id;
	private int $rating_id;
	private int $user_id;
	private string $comment_title;
	private string $comment_body;

	public function getId(): int { return $this->comment_id; }

	public function getRatingId(): int { return $this->rating_id; }

	public function getUserId(): int { return $this->user_id; }

	public function getTitle(): string { return $this->comment_title; }

	public function getBody(): string { return $this->comment_body; }

}