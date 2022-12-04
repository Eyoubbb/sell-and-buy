<?php

class Tag {

	private int $tag_id;
	private int $tag_category_id;
	private string $tag_name;

	public function getId(): int { return $this->tag_id; }

	public function getTagCategoryId(): int { return $this->tag_category_id; }
	
	public function getName(): string { return $this->tag_name; }
	
}