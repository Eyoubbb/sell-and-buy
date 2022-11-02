<?php

class Product {
	
	private int $id;
	private string $categoryId;
	private int $creatorId;
	private string $name;
	private string $description;
	private string $imageUrl;
	private float $price;
	private float $discountPercentage;
	private int $stock;
	private bool $visible;
	
	public function getId(): int { return $this->id; }

	public function getCategoryId(): string { return $this->categoryId; }
	
	public function getCreatorId(): int { return $this->creatorId; }

	public function getName(): string { return $this->name; }
	
	public function getDescription(): string { return $this->description; }
	
	public function getImageUrl(): string { return $this->imageUrl; }
	
	public function getPrice(): float { return $this->price; }
	
	public function getDiscountPercentage(): float { return $this->discountPercentage; }
	
	public function getStock(): int { return $this->stock; }
	
	public function getVisible(): bool { return $this->visible; }
	
}
