<?php

function createCookie(string $name, string $value, int $expire = 31_536_000, bool $httpOnly = true) {

	$secure = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';

	setcookie(
		$name,
		$value,
		time() + $expire,
		'/',
		$_SERVER['SERVER_NAME'],
		$secure,
		$httpOnly
	);
}