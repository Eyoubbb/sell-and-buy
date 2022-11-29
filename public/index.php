<?php

require_once '../src/init.php';

$router = new Router($_GET['url']);

$router->get('/', 'Home#index');

$router->get('/login', 'User#login');
$router->post('/login', 'User#login');

$router->get('/logout', 'User#logout');

$router->get('/register', 'User#register');
$router->post('/register', 'User#register');
 
$router->get('/product', 'Product#index');

$router->get('/creator/:id', 'Creator#index');
$router->get('/askcreator', 'Creator#ask');

$router->run();