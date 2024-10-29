<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/product', 'Home::product');
$routes->get('/users', 'Users::showEmployees');
$routes->get('/editUser/(:any)', 'Users::editUser/$1');
$routes->post('/update', 'Users::update');
