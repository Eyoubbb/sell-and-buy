<?php

class TagCategory {

	private int $tag_category_id;
	private string $tag_category_name;

	public function getId(): int { return $this->tag_category_id; }

	public function getName(): string { return $this->tag_category_name; }
	
}