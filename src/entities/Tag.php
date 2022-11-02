<?php

class Tag {

	private int $id;
	private int $tagCategoryId;
	private string $name;

	public function getId(): int { return $this->id; }

	public function getTagCategoryId(): int { return $this->tagCategoryId; }
	
	public function getName(): string { return $this->name; }
	
}