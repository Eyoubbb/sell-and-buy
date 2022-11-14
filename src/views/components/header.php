<?php
	$frUrl = '/fr' . $_SERVER['REQUEST_URI'];
	$enUrl = '/en' . $_SERVER['REQUEST_URI'];
	$loginUrl = $data['routes']['GET:User#login']->getUrl();
	$logoutUrl = $data['routes']['GET:User#logout']->getUrl();
	$searchUrl = $data['routes']['GET:Home#index']->getUrl();
?>
<header class="topnav">
	<!-- left -->
	<div class="nav-left">
		<a class="logo" href="<?= $data['routes']['GET:Home#index']->getUrl() ?>">
			<img src="<?= PATH_IMAGES . 'logo.svg' ?>" alt="<?= ALT_LOGO ?>" loading="lazy" />
		</a>
		<ul class="nav-links">
			<li>
				<a style="font-weight: bold;"class="hover-link" href="<?= $data['routes']['GET:Home#index']->getUrl() ?>"><?= NAV_SHOP ?></a>
			</li>
			<li>
				<a class="hover-link" href="<?= $data['routes']['GET:Home#index']->getUrl() ?>"><?= NAV_PAGES ?></a>
			</li>
			<li>
				<a class="hover-link" href="<?= $data['routes']['GET:Home#index']->getUrl() ?>"><?= NAV_COLLECTIONS ?></a>
			</li>
			<li>
				<a class="hover-link" href="<?= $data['routes']['GET:Home#index']->getUrl() ?>"><?= NAV_CREATOR ?></a>
			</li>
		</ul>
		<form class="search-form" method="GET" action="<?= $searchUrl ?>">
			<input name="search" placeholder="<?= NAV_SEARCH_PLACEHOLDER ?>" />
			<button class="btn-search">
				<img src="<?= PATH_IMAGES . 'search.svg' ?>" alt="<?= ALT_SEARCH ?>" loading="lazy" />
			</button>
		</form>
	</div>
	<!-- right -->
	<div class="nav-right">
		<a class="btn-search" href="<?= $searchUrl ?>">
			<img src="<?= PATH_IMAGES . 'search.svg' ?>" alt="<?= ALT_SEARCH ?>" loading="lazy" />
		</a>
		<div class="dropdown">
			<button class="btn-caret">
				<?php
					if (isLoggedIn()) {
						$path = PATH_USERS . unserialize($_SESSION['user'])->getPictureUrl();
						$alt = ALT_PROFILE_PICTURE;
						echo <<<HTML
							<img class="profile-picture" src="$path" alt="$alt" loading="lazy" />
						HTML;
					} else {
						echo 'Se connecter';
					}
				?>
				<img src="<?= PATH_IMAGES . 'caret-down.svg' ?>" alt="<?= ALT_MENU ?>" loading="lazy" />
			</button>
			<ul class="dropdown-content">
				<li>
					<a href="<?= $enUrl ?>"><?= EN ?></a>
				</li>
				<li>
					<a href="<?= $frUrl ?>"><?= FR ?></a>
				</li>
				<?php
					if (isLoggedIn()) {
						$text = NAV_LOGOUT;
						$url = $logoutUrl;
					} else {
						$text = NAV_LOGIN;
						$url = $loginUrl;
					}
					echo <<<HTML
						<li>
							<a href="$url">$text</a>
						</li>
					HTML;
				?>
			</ul>
		</div>
	</div>
</header>