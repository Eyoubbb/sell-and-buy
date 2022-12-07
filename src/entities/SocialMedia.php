<?php

class SocialMedia {

	private int $social_media_id;
	private string $social_media_name;
	private ?string $social_media_icon_url;
	private string $social_media_prefix;
	private string $social_media_account;

	public function __construct(?array $row = null) {
		if ($row) {
			$this->social_media_id = $row['social_media_id'];
			$this->social_media_name = $row['social_media_name'];
			$this->social_media_icon_url = $row['social_media_icon_url'];
			$this->social_media_prefix = $row['social_media_prefix'];
			$this->social_media_account = $row['social_media_account'];
		}
	}
	
	public function getId(): int { return $this->social_media_id; }

	public function getName(): string { return $this->social_media_name; }

	public function getIconUrl(): ?string { return $this->social_media_icon_url; }

	public function getPrefix(): string { return $this->social_media_prefix; }

	public function getAccount(): string { return $this->social_media_account; }
	
}