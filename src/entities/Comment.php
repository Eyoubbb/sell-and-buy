<?php

class Comment {

	private int $comment_id;
	private int $comment_rating_id;
	private string $comment_title;
	private string $comment_body;

	public function __construct(?array $row = null) {
		if ($row) {
			$this->comment_id = $row['comment_id'];
			$this->comment_rating_id = $row['comment_rating_id'];
			$this->comment_title = $row['comment_title'];
			$this->comment_body = $row['comment_body'];
		}
	}

	public function getId(): int { return $this->comment_id; }

	public function getRatingId(): int { return $this->comment_rating_id; }

	public function getTitle(): string { return $this->comment_title; }

	public function getBody(): string { return $this->comment_body; }

}