<?php

class Rating {

	private int $id;
	private int $productId;
	private int $commentId;
	private int $userId;
	private int $grade;
	private string $date;

	public function getId(): int { return $this->id; }

	public function getProductId(): int { return $this->productId; }

	public function getCommentId(): int { return $this->commentId; }

	public function getUserId(): int { return $this->userId; }

	public function getGrade(): int { return $this->grade; }
	
	public function getDate(): string { return $this->date; }
	
}