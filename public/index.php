<?php

require_once '../src/init.php';

$router = new Router($_GET['url']);

$router->get('/', 'Home#index');

$router->get('/login', 'User#login');
$router->post('/login', 'User#login');

$router->get('/logout', 'User#logout');

$router->get('/register', 'User#register');
$router->post('/register', 'User#register');

$router->get('/cart', 'Cart#cart');
$router->get('/cart/add', 'Cart#add');
$router->get('/cart/delete', 'Cart#delete');
 
$router->get('/product/:id', 'Product#index')->with('id', '[0-9]+');

$router->get('/creator/:id', 'Creator#index')->with('id', '[0-9]+');
$router->get('/creator/ask', 'Creator#ask');

$router->run();