<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('/product', 'Home::product',['filter' => 'authGuard']);

$routes->get('/users', 'Users::showEmployees', ['filter' => 'authGuard']);
$routes->post('/update', 'Users::update');

$routes->match(['GET', 'POST'], '/mail', 'Home::mail');
$routes->match(['GET', 'POST'], '/register', 'Auth::register');
$routes->match(['GET', 'POST'], '/insert', 'Auth::insert');
$routes->match(['GET','POST'], '/loginPage','Auth::loginPage');
$routes->match(['GET','POST'], '/auth','Auth::auth');
$routes->match(['GET','POST'], '/loginAuth','Auth::loginAuth');
$routes->match(['GET','POST'], '/logout','Auth::logout');

$routes->match(['GET','POST'], '/profile/(:any)','Home::showProfile/$1', ['filter' => 'authGuard']);