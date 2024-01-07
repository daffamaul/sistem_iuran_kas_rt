<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->get('/users', 'Admin\Users::index');
// $routes->get('/coba', 'Coba::index');
// $routes->get('/coba/about', 'Coba::about');
// $routes->get('/coba/about/(:alpha)', 'Coba::about/$1');
// $routes->get('/coba/about/(:alpha)/(:num)', 'Coba::about/$1/$2');
// $routes->setAutoRoute(true);
$routes->addRedirect('/', '/login');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register');

$routes->get('/user', 'User::index');

$routes->post('/admin', 'Admin::index');
$routes->get('/admin', 'Admin::index');
$routes->get('/warga/detail/(:num)', 'Admin::detail/$1');
$routes->get('/warga/create', 'Admin::create');
$routes->post('/warga/save', 'Admin::save');
$routes->delete('/warga/delete/(:num)', 'Admin::delete/$1');
$routes->get('/warga/edit/(:num)', 'Admin::edit/$1');
$routes->post('/warga/update/(:num)', 'Admin::update/$1');

$routes->post('/iuran', 'Iuran::index');
$routes->get('/iuran', 'Iuran::index');
$routes->get('/iuran/create', 'Iuran::create');
$routes->post('/iuran/save', 'Iuran::save');
$routes->get('/iuran/detail/(:num)', 'Iuran::detail/$1');
$routes->delete('/iuran/delete/(:num)', 'Iuran::delete/$1');
$routes->get('/iuran/edit/(:num)', 'Iuran::edit/$1');
$routes->post('/iuran/update/(:num)', 'Iuran::update/$1');

$routes->get('/debug/(:num)', 'Iuran::debug/$1');
$routes->get('/debug', 'Iuran::debug');
