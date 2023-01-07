<?php

class Product {

	private int $product_id;
	private string $product_category_id;
	private int $product_creator_id;
	private string $product_name;
	private string $product_description_en;
	private string $product_description_fr;
	private ?string $product_image_url;
	private float $product_price;
	private float $product_discount_percentage;
	private int $product_stock;
	private bool $product_visible;

	public function __construct(?array $row = null) {
		if ($row) {
			$this->product_id = $row['product_id'];
			$this->product_category_id = $row['product_category_id'];
			$this->product_creator_id = $row['product_creator_id'];
			$this->product_name = $row['product_name'];
			$this->product_description_en = $row['product_description_en'];
			$this->product_description_fr = $row['product_description_fr'];
			$this->product_image_url = $row['product_image_url'];
			$this->product_price = $row['product_price'];
			$this->product_discount_percentage = $row['product_discount_percentage'];
			$this->product_stock = $row['product_stock'];
			$this->product_visible = $row['product_visible'];
		}
	}

	public function getId(): int { return $this->product_id; }

	public function setId(int $id): void { $this->product_id = $id; }

	public function getCategoryId(): string { return $this->product_category_id; }

	public function setCategoryId(string $category_id): void { $this->product_category_id = $category_id; }

	public function getCreatorId(): int { return $this->product_creator_id; }

	public function setCreatorId(int $creator_id): void { $this->product_creator_id = $creator_id; }

	public function getName(): string { return $this->product_name; }

	public function setName(string $name): void { $this->product_name = $name; }

	public function getDescriptionEn(): string { return $this->product_description_en; }

	public function setDescriptionEn(string $description_en): void { $this->product_description_en = $description_en; }

	public function getDescriptionFr(): string { return $this->product_description_fr; }

	public function setDescriptionFr(string $description_fr): void { $this->product_description_fr = $description_fr; }

	public function getImageUrl(): ?string { return $this->product_image_url; }

	public function setImageUrl(?string $image_url): void { $this->product_image_url = $image_url; }

	public function getPrice(): float { return $this->product_price; }

	public function setPrice(float $price): void { $this->product_price = $price; }

	public function getDiscountPercentage(): float { return $this->product_discount_percentage; }

	public function setDiscountPercentage(float $discount_percentage): void { $this->product_discount_percentage = $discount_percentage; }

	public function getStock(): int { return $this->product_stock; }

	public function setStock(int $stock): void { $this->product_stock = $stock; }

	public function getVisible(): bool { return $this->product_visible; }

	public function setVisible(bool $visible): void { $this->product_visible = $visible; }

}