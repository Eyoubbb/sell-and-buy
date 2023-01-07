<?php

require_once '../src/init.php';

$router = new Router($_GET['url']);

$router->get('/', 'Home#index');

$router->get('/login', 'User#login');
$router->post('/login', 'User#login');

$router->get('/logout', 'User#logout');

$router->get('/register', 'User#register');
$router->post('/register', 'User#register');

$router->get('/user/cart', 'User#cart');
$router->get('/user/cart', 'User#addToCart')->with('id', '[0-9]+');
$router->post('/user/cart', 'User#addToCart')->with('id', '[0-9]+');
$router->get('/user/cart', 'User#deleteCart');
$router->post('/user/cart', 'User#deleteCart');
 
$router->get('/product/:id', 'Product#index')->with('id', '[0-9]+');

$router->get('/creator/:id', 'Creator#index')->with('id', '[0-9]+');
$router->get('/creator/ask', 'Creator#ask');

$router->run();