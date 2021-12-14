<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

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
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Login
$routes->get('/', 'C_Admin::Login');
$routes->get('/Login', 'C_Admin::Login');
$routes->get('/Login/Logic_Login', 'C_Admin::Logic_Login');
$routes->get('/Login/Logout', 'C_Admin::Logout');

// Admin
$routes->get('/adm/dashboard', 'C_Admin::Dashboard');

// Karyawan
$routes->get('/adm/kry/(:segment)', 'C_Admin::Karyawan/$1');
$routes->get('/adm/kry/del/(:segment)', 'C_Admin::DelKry/$1');
$routes->get('/adm/kry/add/(:segment)', 'C_Admin::addKry/$1');
$routes->get('/adm/kry/detail/(:segment)', 'C_Admin::DetailKry/$1');
$routes->get('/adm/kry/updt/(:segment)', 'C_Admin::UpdtKry/$1');
$routes->get('/adm/kry/delPlot/(:segment)/(:segment)', 'C_Admin::DeletePlot/$1/$2');

// Siswa Dan Kelas
$routes->get('/adm/snk', 'C_Admin::SiswaDanKelas');
$routes->get('/adm/snk/save', 'C_Admin::SaveKelas');
$routes->get('/adm/snk/detail/(:segment)', 'C_Admin::Detail_Kelas/$1');
$routes->get('/adm/snk/del/(:segment)', 'C_Admin::Sub_Del/$1');
$routes->get('/adm/snk/s/add/(:segment)/(:segment)', 'C_Admin::addSiswa/$1/$2');
$routes->get('/adm/snk/s/del/(:segment)/(:segment)', 'C_Admin::sis_Del/$1/$2');
$routes->get('/adm/snk/s/updt/(:segment)/(:segment)', 'C_Admin::detailSiswa/$1/$2');

// Bank
$routes->get('/adm/bank/updt/(:segment)', 'C_Admin::UpdatePaket/$1');
$routes->get('/adm/bank/del/(:segment)', 'C_Admin::DelPaket/$1');
$routes->get('/adm/bank/(:segment)', 'C_Admin::bankSoal/$1');
$routes->get('/adm/bank/detail/(:segment)', 'C_Admin::DetailSoal/$1');


// Ujian
$routes->get('/adm/ujian/(:segment)', 'C_Admin::Ujian/$1'); //-> main
$routes->get('/adm/ujian/detail/(:segment)', 'C_Admin::DetailUjian/$1'); //->Detail Ujian
$routes->get('/adm/ujian/resetnilaiujian/(:segment)/(:segment)', 'C_Admin::ResetJawabanUjian/$1/$2'); //->Detail Ujian
$routes->get('/adm/ujian/delete/(:segment)', 'C_Admin::deleteUjian/$1'); //->Detail Ujian

// Master
$routes->get('/adm/master', 'C_Admin::master');
$routes->get('/adm/master/save/(:segment)', 'C_Admin::Master_Save/$1');
$routes->get('/adm/master/updt/(:segment)', 'C_Admin::Master_Update/$1');
$routes->get('/adm/master/del/(:segment)/(:segment)', 'C_Admin::Master_Del/$1/$2');


$routes->get('/adm/soal/updt', 'C_Admin::UpdtSoal');
$routes->get('/adm/soal/del/(:segment)/(:segment)', 'C_Admin::DelSoal/$1/$2');

// Percetakan
$routes->get('/cetak/soalujian/(:segment)', 'C_Admin::CetakSoal/$1');
$routes->get('/cetak/kunciujian/(:segment)', 'C_Admin::CetakKuncijawaban/$1');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
