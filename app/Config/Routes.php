<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'halaman::index');
$routes->get('/pelanggan/index', 'Pelanggan::index');
$routes->get('/pelanggan/hapus/(:any)', 'Pelanggan::index');
$routes->delete('/pelanggan/hapus/(:any)', 'Pelanggan::hapus/$1');

$routes->get('/karyawan/hapus/(:any)', 'karyawan::index');
$routes->delete('/karyawan/hapus/(:any)', 'karyawan::hapus/$1');

$routes->get('/paket/hapus/(:any)', 'paket::index');
$routes->delete('/paket/hapus/(:any)', 'paket::hapus/$1');


$routes->get('/laporan', 'Laporan::index');
$routes->post('/laporan/tampilkanLaporan', 'Laporan::tampilkanLaporan');
$routes->post('/laporan/showReport', 'Laporan::showReport');
$routes->post('/laporan/status', 'Laporan::status');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
