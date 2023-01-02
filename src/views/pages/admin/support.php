<section class="support">
	<div class="info-wrapper">
		<div class="info">
			<img class="total" src="<?= PATH_IMAGES . 'ticket-32x32.png' ?>" alt="total-tickets">
			<div>
				<h1>1000</h1>
				<p>Total tickets</p>
			</div>
		</div>
		<div class="info">
			<img class="pending" src="<?= PATH_IMAGES . 'hourglass-32x32.png' ?>" alt="pending-tickets">
			<div>
				<h1>0</h1>
				<p>Pending tickets</p>
			</div>
		</div>
		<div class="info">
			<img class="closed" src="<?= PATH_IMAGES . 'archive-32x32.png' ?>" alt="closed-tickets">
			<div>
				<h1>0</h1>
				<p>Closed tickets</p>
			</div>
		</div>
		<div class="info">
			<img class="deleted" src="<?= PATH_IMAGES . 'trash-32x32.png' ?>" alt="deleted-tickets">
			<div>
				<h1>0</h1>
				<p>Deleted tickets</p>
			</div>
		</div>
	</div>

	<div class="ticket">
		<?php
			$pathMore = PATH_IMAGES . 'more.png';
		?>
		<table>
			<tr class="title">
				<td>
					<span><?= TICKET_ID ?></span>
					<img class="caret-img" src="<?= PATH_IMAGES . 'caret-down.svg' ?>" alt="<?= ALT_MENU ?>" loading="lazy"/></td>
				<td>
					<span><?= TICKET_USER_ID ?></span>
					<img class="caret-img" src="<?= PATH_IMAGES . 'caret-down.svg' ?>" alt="<?= ALT_MENU ?>" loading="lazy"/></td>
				</td>
				<td>
					<span><?= TICKET_NAME ?></span>
					<img class="caret-img" src="<?= PATH_IMAGES . 'caret-down.svg' ?>" alt="<?= ALT_MENU ?>" loading="lazy"/></td>
				</td>
				<td>
					<span><?= TICKET_ASIGNEE?></span>
					<img class="caret-img" src="<?= PATH_IMAGES . 'caret-down.svg' ?>" alt="<?= ALT_MENU ?>" loading="lazy"/></td>
				</td>
				<td>
					<span><?= TICKET_STATUS ?></span>
					<img class="caret-img" src="<?= PATH_IMAGES . 'caret-down.svg' ?>" alt="<?= ALT_MENU ?>" loading="lazy"/></td>
				</td>
				<td>
					<span><?= TICKET_DATE ?></span>
					<img class="caret-img" src="<?= PATH_IMAGES . 'caret-down.svg' ?>" alt="<?= ALT_MENU ?>" loading="lazy"/></td>
				</td>
				<td>
					<span><?= TICKET_ACTION ?></span>
					<img class="caret-img" src="<?= PATH_IMAGES . 'caret-down.svg' ?>" alt="<?= ALT_MENU ?>" loading="lazy"/></td>
				</td>
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
							<td>#$ticketID</td>
							<td>$ticketUserID</td>
							<td>$ticketName</td>
							<td></td>
							<td>$ticketStatus</td>
							<td>$ticketDate</td>
							<td><img src="$pathMore" alt="more-button"></td>
						</tr>
					HTML;
				}
			?>
		</table>
	</div>

</section>