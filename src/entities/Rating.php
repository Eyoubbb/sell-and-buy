<?php

class Rating {

	private int $rating_id;
	private int $rating_product_id;
	private int $rating_comment_id;
	private int $rating_user_id;
	private int $rating_grade;
	private string $rating_date;

	public function __construct(?array $row = null) {
		if ($row) {
			$this->rating_id = $row['rating_id'];
			$this->rating_product_id = $row['rating_product_id'];
			$this->rating_comment_id = $row['rating_comment_id'];
			$this->rating_user_id = $row['rating_user_id'];
			$this->rating_grade = $row['rating_grade'];
			$this->rating_date = $row['rating_date'];
		}
	}
	
	public function getId(): int { return $this->rating_id; }

	public function getProductId(): int { return $this->rating_product_id; }

	public function getCommentId(): int { return $this->rating_comment_id; }

	public function getUserId(): int { return $this->rating_user_id; }

	public function getGrade(): int { return $this->rating_grade; }
	
	public function getDate(): string { return $this->rating_date; }
	
}