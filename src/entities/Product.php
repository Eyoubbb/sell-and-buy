<?php

class Product {
	
	private int $product_id;
	private string $category_id;
	private int $creator_id;
	private string $product_name;
	private string $product_description;
	private ?string $product_image_url;
	private float $product_price;
	private float $product_discount_percentage;
	private int $product_stock;
	private bool $product_visible;
	
	public function __construct(?array $row = null) {
		if ($row) {
			$this->product_id = $row['product_id'];
			$this->category_id = $row['category_id'];
			$this->creator_id = $row['creator_id'];
			$this->product_name = $row['product_name'];
			$this->product_description = $row['product_description'];
			$this->product_image_url = $row['product_image_url'];
			$this->product_price = $row['product_price'];
			$this->product_discount_percentage = $row['product_discount_percentage'];
			$this->product_stock = $row['product_stock'];
			$this->product_visible = $row['product_visible'];
		}
	}
	
	public function getId(): int { return $this->product_id; }

	public function getCategoryId(): string { return $this->category_id; }
	
	public function getCreatorId(): int { return $this->creator_id; }

	public function getName(): string { return $this->product_name; }
	
	public function getDescription(): string { return $this->product_description; }
	
	public function getImageUrl(): ?string { return $this->product_image_url; }
	
	public function getPrice(): float { return $this->product_price; }
	
	public function getDiscountPercentage(): float { return $this->product_discount_percentage; }
	
	public function getStock(): int { return $this->product_stock; }
	
	public function getVisible(): bool { return $this->product_visible; }
	
}