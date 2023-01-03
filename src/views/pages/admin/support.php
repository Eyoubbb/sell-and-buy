<?php

$tickets = $data['tickets'];
$admins = $data['admins'];
$users = $data['users'];

$pending = 0;
$resolved = 0;

foreach($tickets as $ticket) {
	$ticket->getResolved() ? $resolved++ : $pending++;
}
?>

<section class="support">
	<div class="info-wrapper">
		<div class="info">
			<img class="total" src="<?= PATH_IMAGES . 'ticket-32x32.png' ?>" alt="total-tickets">
			<div>
				<h1><?= count($tickets) ?></h1>
				<p>Total tickets</p>
			</div>
		</div>
		<div class="info">
			<img class="pending" src="<?= PATH_IMAGES . 'hourglass-32x32.png' ?>" alt="pending-tickets">
			<div>
				<h1><?= $pending ?></h1>
				<p>Pending tickets</p>
			</div>
		</div>
		<div class="info">
			<img class="closed" src="<?= PATH_IMAGES . 'archive-32x32.png' ?>" alt="closed-tickets">
			<div>
				<h1><?= $resolved ?></h1>
				<p>Closed tickets</p>
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
				foreach($tickets as $ticket) {
					$user = $users[$ticket->getUserId()];
					$admin = $admins[$ticket->getAdminId()];

					$resolved = $ticket->getResolved() ? 'Closed' : 'Opened';
	
					echo <<<HTML
						<tr>
							<td>{$ticket->getId()}</td>
							<td>{$user->getFirstName()}</td>
							<td>{$ticket->getName()}</td>
							<td>{$admin->getFirstName()}</td>
							<td>{$resolved}</td>
							<td>{$ticket->getDate()}</td>
							<td><img class="more-img" src="$pathMore" alt="more-button"></td>
						</tr>
					HTML;
				}
			?>
		</table>
	</div>

</section>