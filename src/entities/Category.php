<?php

class Category {

	private int $category_id;
	private string $category_name;
	private string $category_description;

	public function __construct(?array $row = null) {
		if ($row) {
			$this->category_id = $row['category_id'];
			$this->category_name = $row['category_name'];
			$this->category_description = $row['category_description'];
		}
	}
	
	public function getId(): int { return $this->category_id; }

	public function getName(): string { return $this->category_name; }

	public function getDescription(): string { return $this->category_description; }
	
}