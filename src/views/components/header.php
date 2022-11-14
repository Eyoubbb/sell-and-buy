<header class="topnav">
	<!-- left -->
	<div class="nav-item">
		<a href="#">
			<img class="logo" src="/images/logo.svg" alt="">
		</a>
		<ul class="nav-item left">
			<li>
				<a style="font-weight: bold;"class="hover-link" href=""><?= NAV_SHOP ?></a>
			</li>
			<li>
				<a class="hover-link" href=""><?= NAV_PAGES ?></a>
			</li>
			<li>
				<a class="hover-link" href=""><?= NAV_COLLECTIONS ?></a>
			</li>
			<li>
				<a class="hover-link" href=""><?= NAV_CREATOR ?></a>
			</li>
		</ul>
	</div>
	<!-- right -->
	<div class="nav-item">
		<ul class="nav-item right">
			<li>
				<a class="hover-link" href="">FR</a>
			</li>
			<li>
				<a class="hover-link" href="">EN</a>
			</li>
			<li>
				<a class="hover-link" href=""><?= NAV_LOGIN ?></a>
			</li>
			<li>
				<a id="search"><?= NAV_SEARCH ?></a>
			</li>
			<li>
				<form class="hide" method="GET">
					<div class="search-form">
						<input id="text-input" type="text" name="" placeholder="Search..." aria-label="search" required>
						<input type="submit" value="OK">
					</div>
				</form>
			</li>
		</ul>
		<div class="dropdown">
			<div class="plus-btn"></div>
			<ul class="dropdown-content">
				<li>
					<a href="">FR</a>
				</li>
				<li>
					<a href="">EN</a>
				</li>
				<li>
					<a href=""><?= NAV_LOGIN ?></a>
				</li>
				<li>
					<form method="GET">
						<div class="search-form">
							<input id="text-input" type="text" name="" placeholder="Search..." aria-label="search" required>
							<input class="submit" type="submit" value="OK">
						</div>
					</form>
				</li>
			</ul>
		</div>
	</div>
</header>