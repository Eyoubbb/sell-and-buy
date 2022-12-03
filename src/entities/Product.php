<?php

class Product {
	
	private int $id;
	private string $category_id;
	private int $creator_id;
	private string $name;
	private string $description;
	private ?string $image_url;
	private float $price;
	private float $discount_percentage;
	private int $stock;
	private bool $visible;
	
	public function __construct(?array $row = null) {
		if ($row) {
			$this->id = $row['product_id'];
			$this->category_id = $row['category_id'];
			$this->creator_id = $row['creator_id'];
			$this->name = $row['product_name'];
			$this->description = $row['product_description'];
			$this->image_url = $row['product_image_url'];
			$this->price = $row['product_price'];
			$this->discount_percentage = $row['product_discount_percentage'];
			$this->stock = $row['product_stock'];
			$this->visible = $row['product_visible'];
		}
	}
	
	public function getId(): int { return $this->id; }

	public function getCategoryId(): string { return $this->category_id; }
	
	public function getCreatorId(): int { return $this->creator_id; }

	public function getName(): string { return $this->name; }
	
	public function getDescription(): string { return $this->description; }
	
	public function getImageUrl(): ?string { return $this->image_url; }
	
	public function getPrice(): float { return $this->price; }
	
	public function getDiscountPercentage(): float { return $this->discount_percentage; }
	
	public function getStock(): int { return $this->stock; }
	
	public function getVisible(): bool { return $this->visible; }
	
}