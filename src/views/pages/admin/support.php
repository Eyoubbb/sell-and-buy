<section class="support">
	<div class="info-wrapper">
		<div class="info">
			<img class="total" src="<?= PATH_FAVICON . 'ticket-32x32.png' ?>" alt="total-tickets">
			<div>
				<h1>1000</h1>
				<p>Total tickets</p>
			</div>
		</div>
		<div class="info">
			<img class="pending" src="<?= PATH_FAVICON . 'hourglass-32x32.png' ?>" alt="pending-tickets">
			<div>
				<h1>0</h1>
				<p>Pending tickets</p>
			</div>
		</div>
		<div class="info">
			<img class="closed" src="<?= PATH_FAVICON . 'archive-32x32.png' ?>" alt="closed-tickets">
			<div>
				<h1>0</h1>
				<p>Closed tickets</p>
			</div>
		</div>
		<div class="info">
			<img class="deleted" src="<?= PATH_FAVICON . 'trash-32x32.png' ?>" alt="deleted-tickets">
			<div>
				<h1>0</h1>
				<p>Deleted tickets</p>
			</div>
		</div>
	</div>

	<div class="ticket">
		<table>
			<tr class="title">
				<td><?= TICKET_ID ?></td>
				<td><?= TICKET_USER_ID ?></td>
				<td><?= TICKET_NAME ?></td>
				<td><?= TICKET_STATUS ?></td>
				<td><?= TICKET_DATE ?></td>
			</tr>
			<?php
				for($i = 0; $i < 3; $i++) {
					$ticketID = 1;
					$ticketUserID = 1;
					$ticketName = "Test";
					$ticketStatus = "Open";
					$ticketDate = "2020-01-01";
		
					echo <<<HTML
						<tr>
							<td>$ticketID</td>
							<td>$ticketUserID</td>
							<td>$ticketName</td>
							<td>$ticketStatus</td>
							<td>$ticketDate</td>
						</tr>
					HTML;
				}
			?>
		</table>
	</div>

</section>