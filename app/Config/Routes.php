<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Main::index');

$routes->get("tabulka", 'Main::tabulka');

$routes->get('stranka/(:num)', 'Main::stranka/$1');

$routes->get('stanice/(:num)', 'Main::stanice/$1');

$routes->get('vsechny-zeme', 'Main::allCountries'); 

$routes->get('station/new', 'Main::new');
$routes->post('station/create', 'Main::create');

$routes->get('station/edit/(:num)', 'Main::edit/$1');
$routes->post('station/update/(:num)', 'Main::update/$1');

$routes->post('station/delete/(:num)', 'Main::delete/$1');

$routes->get('data/new/(:num)', 'Main::newData/$1');
$routes->post('data/create', 'Main::createData');
$routes->get('data/edit/(:num)', 'Main::editData/$1');
$routes->post('data/update/(:num)', 'Main::updateData/$1');
$routes->post('data/delete/(:num)', 'Main::deleteData/$1');


