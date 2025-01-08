<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Main::index');

$routes->get("tabulka", 'Main::tabulka');

$routes->get('stranka/(:num)', 'Main::stranka/$1');


