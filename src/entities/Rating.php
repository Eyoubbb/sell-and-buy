<?php

class Rating {

	private int $rating_id;
	private int $product_id;
	private int $comment_id;
	private int $user_id;
	private int $rating_grade;
	private string $rating_date;

	public function getId(): int { return $this->rating_id; }

	public function getProductId(): int { return $this->product_id; }

	public function getCommentId(): int { return $this->comment_id; }

	public function getUserId(): int { return $this->user_id; }

	public function getGrade(): int { return $this->rating_grade; }
	
	public function getDate(): string { return $this->rating_date; }
	
}