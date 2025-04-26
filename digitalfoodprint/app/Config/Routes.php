<?php
use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::DFPHome');
$routes->get('/home', 'Home::DFPHome');
$routes->get('/tracetaste', 'home::DFPtracetaste');
$routes->get('/growpedia', 'home::DFPgrowpedia');
$routes->get('/agritales', 'home::DFPagritales');
$routes->get('/ship_it_out', 'home::DFPshipitout');
$routes->get('/nusantara', 'home::DFPnusantara');
$routes->get('/ecobit', 'home::DFPecobit');

$routes->get('/', 'Articles::index');
$routes->get('articles', 'Articles::index');
$routes->get('articles/(:segment)', 'Articles::view/$1');