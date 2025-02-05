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


