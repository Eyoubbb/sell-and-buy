<?php

require_once '../src/init.php';

$router = new Router($_GET['url']);

$router->get('/', 'Home#index');

$router->get('/login', 'User#login');
$router->post('/login', 'User#login');

$router->get('/logout', 'User#logout');

$router->get('/register', 'User#register');
$router->post('/register', 'User#register');

$router->get('/product/:id', 'Product#index')->with('id', '[0-9]+');

$router->get('/product/:id/edit', 'Product#edit')->with('id', '[0-9]+');
$router->post('/product/:id/edit', 'Product#edit')->with('id', '[0-9]+');

$router->get('/product/:id/delete', 'Product#delete')->with('id', '[0-9]+');

$router->get('/product/new', 'Product#new');
$router->post('/product/new', 'Product#new');

$router->get('/creator/:id', 'Creator#index')->with('id', '[0-9]+');
$router->get('/creator/ask', 'Creator#ask');

$router->run();