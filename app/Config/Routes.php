<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
// $routes->get('/', 'Home::index');
// $routes->get('/', 'Datatables::index');
$routes->group('wilayah', function ($routes) {
    $routes->get('provinsi', 'Wilayah::provinsi');
    $routes->get('kabupaten/(:num)', 'Wilayah::kabupaten/$1');
    $routes->get('kecamatan/(:num)', 'Wilayah::kecamatan/$1');
    $routes->get('desa/(:num)', 'Wilayah::desa/$1');
});

$routes->post('peserta/uploadDokumen', 'Peserta::uploadDokumen');
$routes->get('peserta/detail_siswa/(:num)', 'Peserta::detail_siswa/$1');
$routes->post('peserta/uploadDokumen/(:num)', 'Peserta::uploadDokumen/$1');


// $routes->get('/', 'Home::index');

// $routes->get('/peserta/(:seg)', 'Peserta::detail/$1');

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
