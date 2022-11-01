<?php

require_once '../src/init.php';

$router = new Router($_GET['url']);

$router->get('/', "Home#index");

$router->run();