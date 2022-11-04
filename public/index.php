<?php

require_once '../src/init.php';

$router = new Router($_GET['url']);

$router->get('/', 'Home#index');
$router->get('/login', 'User#login');
$router->post('/login', 'User#login');

$router->run();