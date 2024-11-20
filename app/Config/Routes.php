<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/form', 'Home::index');
$routes->post('/add','Home::add');


$routes->get('/Details','Home::Details');

$routes->get('/delete/(:num)','Home::delete/$1');

$routes->get("/edit/(:num)","Home::fetchEmp/$1");

//for update
$routes->post("/update","Home::update");
