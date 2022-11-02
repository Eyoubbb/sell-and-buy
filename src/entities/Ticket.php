<?php

class Ticket {

	private int $id;
	private int $userId;
	private int $ticketTypeId;
	private int $adminId;
	private string $name;
	private string $description;
	private string $date;
	private bool $resolved;

	public function getId(): int { return $this->id; }

	public function getUserId(): int { return $this->userId; }
	
	public function getTicketTypeId(): int { return $this->ticketTypeId; }

	public function getAdminId(): int { return $this->adminId; }

	public function getName(): string { return $this->name; }

	public function getDescription(): string { return $this->description; }

	public function getDate(): string { return $this->date; }

	public function getResolved(): bool { return $this->resolved; }
	
}