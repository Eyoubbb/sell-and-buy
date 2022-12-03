<?php

class Category {

	private int $id;
	private string $name;
	private string $description;

	public function __construct(?array $row = null) {
		if ($row) {
			$this->id = $row['category_id'];
			$this->name = $row['category_name'];
			$this->description = $row['category_description'];
		}
	}
	
	public function getId(): int { return $this->id; }

	public function getName(): string { return $this->name; }

	public function getDescription(): string { return $this->description; }
	
}