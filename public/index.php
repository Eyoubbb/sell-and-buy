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

$router->get('/admin', 'Admin#index');

$router->get('/admin/support', 'Admin#support');

$router->get('/admin/support/:id/resolve', 'Admin#resolve')->with('id', '[0-9]+');
$router->get('/admin/support/:id/reopen', 'Admin#reopen')->with('id', '[0-9]+');
$router->get('/admin/support/:id/delete', 'Admin#delete')->with('id', '[0-9]+');

$router->run();