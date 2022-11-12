<header class="topnav">
	<!-- left -->
	<div>
		<ul class="nav-item">
			<a href="#">
				<img src="/images/logo.svg" alt="">
			</a>
			<li>
				<a class="hover-link" href=""><?= NAV_SHOP ?></a>
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
	<div>
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
						<input  id="text-input" type="text" name="" placeholder="Search..." aria-label="search" required>
						<input type="submit" value="OK">
					</div>
				</form>
			</li>
		</ul>
	</div>
</header>