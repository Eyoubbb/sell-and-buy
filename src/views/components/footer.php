<footer>
	<div class="footer-top">
		<ul>
			<li>
				<p><?= PAYMENT ?></p>
			</li>

			<li>
				<a href=""><?= BECOME_CREATOR ?></a>
			</li>
			<li>
				<a href=""><?= CUSTOMER_SERVICE ?></a>
			</li>
			<li>
				<span><a href=""><?= SHIPPING_RETURN ?></a></span>
				<span><a href=""><?= FIND_OUT ?></a></span>
			</li>
		</ul>
	</div>
	<div class="footer-bottom">
		<div class="footer-left">
			<ul>
				<li>
					<a class="hover-link" href="">Contact</a>
				</li>
				<li>
					<a class="hover-link" href=""><?= LEGAL_MENTION ?></a>
				</li>
				<li>
					<a class="hover-link" href=""><?= CONDITION_VENTE ?></a>
				</li>
			</ul>
			<p>© SAB 2022. <?= COPYRIGHT ?></p>
		</div>
		<div class="footer-right">
			<form method="POST">
				<label for="newsletter"><?= NEWSLETTER ?></label>
				<input id="newsletter" type="email" name="email" placeholder="<?= EMAIL_ADDRESS ?>" required>
				<button class="submit">OK</button>
			</form>
		</div>
	</div>
</footer>