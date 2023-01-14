<?php
	$user = unserialize($_SESSION['user']);
?>
<section class="settings">
	<section class="security">
		<ul>
			<li>
				<div class="list-item">
					<div class="wrapper">
						<h1><?= SETTINGS_FIRST_NAME ?></h1>
						<p><?= $user->getFirstName(); ?></p>
					</div>
					<button class="modify"><?= SETTINGS_MODIFY ?></button>
				</div>
			</li>
			<li>
				<div class="list-item">
					<div class="wrapper">
						<h1><?= SETTINGS_LAST_NAME ?></h1>
						<p><?= $user->getLastName(); ?></p>
					</div>	
					<button class="modify"><?= SETTINGS_MODIFY ?></button>
				</div>
			</li>
			<li>
				<div class="list-item">
					<div>
						<h1><?= SETTINGS_EMAIL ?></h1>
						<p><?= $user->getEmail(); ?></p>
					</div>
					<button class="modify"><?= SETTINGS_MODIFY ?></button>
				</div>
			</li>
			<li>
				<div class="list-item">
					<div>
						<h1><?= SETTINGS_PASSWORD ?></h1>
						<p><?= SETTINGS_DUMMY_PASSWORD ?></p>
					</div>
					<button class="modify"><?= SETTINGS_MODIFY ?></button>
				</div>
			</li>
		</ul>
	</section>
</section>