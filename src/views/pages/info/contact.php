<section class="contact-container">

    <div class="container-image">
        <img src="<?= PATH_IMAGES . 'contact.svg' ?>" alt="<?= CONTACT_ALT_CONTACT ?>" loading="lazy" />
    </div>
    <div class="content">
        <h1><?= INFO_CONTACT_WINDOW_TITLE ?></h1>
        <p><?= CONTACT_ANY_QUESTIONS ?></p>
        <div class="container-stickers">
            <?php
                $alt = ALT_PROFILE_PICTURE;
				$admins = $this->model('Admin')->contact();
				foreach ($admins as $userArray) {
					$user = new User($userArray);

					$name =$user->getFirstName() . ' ' . $user->getLastName();
					$mail = $user->getEmail();
					$path = PATH_USERS . $user->getPictureUrl();

					echo <<<HTML
						<a href="mailto:$mail" class="sticker-contact">
							<div class="sticker-contact">
								<img class="admin-profile-picture" src="$path" alt="$alt" loading="lazy" />
								<div class="admin-imformations">	
									<p>$name</p>
									<div class="separator"></div>
									<p>$mail</p>
								</div>
							</div>
						</a>
					HTML;
				}
            ?>
        </div>
    </div>
</section>