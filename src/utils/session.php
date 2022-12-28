<?php

function isLoggedIn(): bool {
	return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

function isAdmin(): bool {
	return isset($_SESSION['user']) && $_SESSION['user'] instanceof Admin;
}

