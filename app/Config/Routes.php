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
$routes->setAutoRoute(false);

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


// $routes->get('/', 'Home::index');


// Login Siswa & Guru
$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::loginUser');

// Login Admin
$routes->get('/auth/loginadmin', 'Auth::loginAdminPage');
$routes->post('/auth/loginAdmin', 'Auth::loginAdmin');
$routes->get('/auth/logout', 'Auth::logout');




$routes->group('admin', ['filter' => 'role:1'], function ($routes) {
    $routes->get('/', 'Admin::index');



    // Tahun
    $routes->get('ta', 'Ta::index');


    // Setting

    // $routes->get('', 'TahunController::create');
    // $routes->get('tahun/edit/(:num)', 'Admin\TahunController::edit/$1');

    // Peserta
    $routes->get('peserta', 'Peserta::index');
    $routes->get('peserta/detail_siswa/(:any)', 'Peserta::detail_siswa/$1');
    $routes->get('peserta/add', 'Peserta::add');
    $routes->post('peserta/add', 'Peserta::add');
    $routes->post('peserta/verifikasi/(:any)', 'Peserta::verifikasi/$1');
    // --edit_ortu
    $routes->get('peserta/edit_ortu/(:any)', 'Peserta::edit_ortu/$1');
    $routes->post('peserta/edit_ortu/(:any)', 'Peserta::edit_ortu/$1');
    // --edit_register
    $routes->get('peserta/edit_register/(:any)', 'Peserta::edit_register/$1');
    $routes->post('peserta/edit_register/(:any)', 'Peserta::edit_register/$1');

    // --edit_tinggal
    $routes->get('peserta/edit_tinggal/(:any)', 'Peserta::edit_tinggal/$1');
    $routes->post('peserta/edit_tinggal/(:any)', 'Peserta::edit_tinggal/$1');
    // --edit_tinggal
    $routes->get('peserta/edit_alamat/(:any)', 'Peserta::edit_alamat/$1');
    $routes->post('peserta/edit_alamat/(:any)', 'Peserta::edit_alamat/$1');
    // --edit_identitas
    $routes->get('peserta/edit_identitas/(:any)', 'Peserta::edit_identitas/$1');
    $routes->post('peserta/edit_identitas/(:any)', 'Peserta::edit_identitas/$1');
    // UploadDokumen
    $routes->get('peserta/uploadDokumen/(:any)', 'Peserta::uploadDokumen/$1');
    $routes->post('peserta/uploadDokumen/(:any)', 'Peserta::uploadDokumen/$1');



    // // Rombel
    $routes->get('kelas', 'Kelas::index');
    $routes->get('kelas/rincian_kelas/(:any)', 'Kelas::rincian_kelas/$1');
    $routes->get('kelas/edit/(:any)', 'Kelas::edit/$1');
    $routes->get('kelas/add', 'Kelas::add');
    $routes->post('kelas/add', 'Kelas::add');
    $routes->get('kelas/tambahanggota/(:any)', 'Kelas::tambahanggota/$1');
    $routes->post('kelas/tambahanggota/(:any)', 'Kelas::tambahanggota/$1');
    $routes->get('kelas/hapusanggota/(:any)', 'Kelas::hapusanggota/$1');
    $routes->get('kelas/printexcel/(:any)', 'Kelas::printexcel/$1');

    $routes->get('kelas/upload/(:any)', 'Kelas::upload/$1');
    $routes->post('kelas/upload/(:any)', 'Kelas::upload/$1');
    // $routes->get('rombel/create', 'Admin\RombelController::create');
    // $routes->get('rombel/edit/(:num)', 'Admin\RombelController::edit/$1');


    // // Guru
    $routes->get('guru', 'Guru::index');
    $routes->get('guru/add', 'Guru::add');
    $routes->post('guru/add', 'Guru::add');
    // $routes->get('rombel/create', 'Admin\RombelController::create');
    // $routes->get('rombel/edit/(:num)', 'Admin\RombelController::edit/$1');
});




// ADMIN


// $routes->get('/peserta/(:seg)', 'Peserta::detail/$1');



$routes->get('dokumen/(:any)', 'Dokumen::view/$1');
$routes->post('siswa/update/(:num)', 'Siswa::update/$1');





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
