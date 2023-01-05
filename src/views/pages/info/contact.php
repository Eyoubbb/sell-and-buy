
<section class="contact-container">

    <div class="container-image">
        <img src="<?= PATH_IMAGES . 'contact.svg' ?>" alt="<?= CONTACT_ALT_CONTACT ?>" loading="lazy" />
    </div>
    <div class="content">
        <h1><?= INFO_CONTACT_WINDOW_TITLE ?></h1>
        <p><?= CONTACT_ANY_QUESTIONS ?></p>

        <div class="container-stickers">

            <?php
                $path = PATH_USERS . $user->getPictureUrl();
                $alt = ALT_PROFILE_PICTURE;
                for ($i = 0; $i < 5; $i++) {
                    echo <<<HTML
                        <div class="sticker-contact">
                            <img class="admin-profile-picture" src="$path" alt="$alt" loading="lazy" />
                        </div>
                    HTML;
                }
            ?>
            <!-- <div class="sticker-contact">
                <?php
					if ($user) {
						$path = PATH_USERS . $user->getPictureUrl();
						$alt = ALT_PROFILE_PICTURE;
						echo <<<HTML
							<img class="admin-profile-picture" src="$path" alt="$alt" loading="lazy" />
						HTML;
					} else {
						echo NAV_ACCOUNT;
					}
				?>
            </div>    
            <div class="sticker-contact">
                <?php
					if ($user) {
						$path = PATH_USERS . $user->getPictureUrl();
						$alt = ALT_PROFILE_PICTURE;
						echo <<<HTML
							<img class="admin-profile-picture" src="$path" alt="$alt" loading="lazy" />
						HTML;
					} else {
						echo NAV_ACCOUNT;
					}
				?>
            </div>
            <div class="sticker-contact">
                <?php
					if ($user) {
						$path = PATH_USERS . $user->getPictureUrl();
						$alt = ALT_PROFILE_PICTURE;
						echo <<<HTML
							<img class="admin-profile-picture" src="$path" alt="$alt" loading="lazy" />
						HTML;
					} else {
						echo NAV_ACCOUNT;
					}
				?>
            </div>
            <div class="sticker-contact">
                <?php
					if ($user) {
						$path = PATH_USERS . $user->getPictureUrl();
						$alt = ALT_PROFILE_PICTURE;
						echo <<<HTML
							<img class="admin-profile-picture" src="$path" alt="$alt" loading="lazy" />
						HTML;
					} else {
						echo NAV_ACCOUNT;
					}
				?>
            </div>
            <div class="sticker-contact">
                <?php
					if ($user) {
						$path = PATH_USERS . $user->getPictureUrl();
						$alt = ALT_PROFILE_PICTURE;
						echo <<<HTML
							<img class="admin-profile-picture" src="$path" alt="$alt" loading="lazy" />
						HTML;
					} else {
						echo NAV_ACCOUNT;
					}
				?>
            </div> -->
        </div>
    </div>
</section>