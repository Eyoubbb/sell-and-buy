<?php

class TicketType {

	private int $ticket_type_id;
	private string $ticket_type_name;

	public function getId(): int { return $this->ticket_type_id; }

	public function getName(): string { return $this->ticket_type_name; }
	
}