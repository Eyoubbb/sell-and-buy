<?php

class Tag {

	private int $tag_id;
	private int $tag_tag_category_id;
	private string $tag_name;

	public function __construct(?array $row = null) {
		if ($row) {
			$this->tag_id = $row['tag_id'];
			$this->tag_tag_category_id = $row['tag_tag_category_id'];
			$this->tag_name = $row['tag_name'];
		}
	}
	
	public function getId(): int { return $this->tag_id; }

	public function getTagCategoryId(): int { return $this->tag_tag_category_id; }
	
	public function getName(): string { return $this->tag_name; }
	
}