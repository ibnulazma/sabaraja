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

$routes->get('admin/toggle-maintenance', 'Admin::toggleMaintenance');
// $routes->get('/', 'Home::index');


// Login Siswa & Guru
$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::loginUser');

// Login Admin
$routes->get('/auth/loginadmin', 'Auth::loginAdminPage');
$routes->post('/auth/loginadmin', 'Auth::loginAdmin');
$routes->get('/auth/logout', 'Auth::logout');




$routes->group('admin', ['filter' => 'role:1'], function ($routes) {
    // Tahun
    $routes->get('/', 'Admin::index');
    // $routes->get('tahun/create', 'Admin\TahunController::create');
    // $routes->get('tahun/edit/(:num)', 'Admin\TahunController::edit/$1');

    // // Peserta
    // $routes->get('peserta', 'Admin\PesertaController::index');
    // $routes->get('peserta/create', 'Admin\PesertaController::create');
    // $routes->get('peserta/edit/(:num)', 'Admin\PesertaController::edit/$1');

    // // Rombel
    // $routes->get('rombel', 'Admin\RombelContro::index');
    // $routes->get('rombel/create', 'Admin\RombelController::create');
    // $routes->get('rombel/edit/(:num)', 'Admin\RombelController::edit/$1');
});




// Siswa
$routes->group('siswa', ['filter' => 'role:3'], function ($routes) {
    $routes->get('/', 'Siswa::index');
});

$routes->group('pendidik', ['filter' => 'role:2'], function ($routes) {
    $routes->get('/', 'Pendidik::index');
});


$routes->get('access-denied', function () {
    return view('error/access_denied');
});



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
