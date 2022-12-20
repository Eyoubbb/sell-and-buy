<?php

class TagCategory {

	private int $tag_category_id;
	private string $tag_category_name;

	public function __construct(?array $row = null) {
		if ($row) {
			$this->tag_category_id = $row['tag_category_id'];
			$this->tag_category_name = $row['tag_category_name'];
		}
	}
	
	public function getId(): int { return $this->tag_category_id; }

	public function getName(): string { return $this->tag_category_name; }
	
}