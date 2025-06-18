<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('MainController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved). 
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'MainController::index');
$routes->get('kompetisi/(:segment)', 'MainController::kompetisi/$1');

$routes->get('seminar', 'MainController::seminar');
$routes->get('seminar/daftar', 'MainController::daftarSeminar');
$routes->get('seminar/tiket', 'SeminarController::tiket');
$routes->get('seminar/tiket/download', 'SeminarController::downloadTiket');
$routes->get('payment/seminar', 'PaymentController::seminar');
$routes->post('payment/seminar', 'PaymentController::seminar');

$routes->get('transaction/handler', 'NotificationController::handleTransactionStatus');
$routes->get('sejarah', 'MainController::kilasBalik');
$routes->get('sejarah/(:segment)', 'MainController::sejarah/$1');

$routes->get('kompetisi/payment/(:segment)', 'PaymentController::lomba/$1');
$routes->get('payment/cancel/seminar/(:segment)', 'PaymentController::cancelSeminar/$1');
$routes->get('payment/cancel/lomba/(:segment)', 'PaymentController::cancelLomba/$1');
$routes->get('/payment/finish', 'PaymentController::finishPayment');
$routes->get('/payment/error', 'PaymentController::errorPayment');

$routes->group('profile', static function($routes) {
    $routes->get('/', 'UserController::index');
    $routes->get('confirm', 'UserController::confirm');
    $routes->get('kuesioner', 'UserController::kuesioner');
    $routes->post('confirm', 'UserController::confirm');
    $routes->post('kuesioner', 'UserController::kuesioner');
    $routes->get('daftar-lomba', 'UserController::daftarLomba');
    $routes->post('daftar-lomba', 'UserController::daftarLomba');
    $routes->post('join-tim', 'UserController::joinTim');
    $routes->post('terima-anggota', 'UserController::terimaAnggota');
    $routes->post('upload-berkas', 'UserController::uploadBerkas');
    $routes->post('ubah-password', 'UserController::ubahPassword');
    $routes->get('submission', 'UserController::submission');
    $routes->post('submission/proposal', 'UserController::submissionProposal');
    $routes->post('submission/source-code', 'UserController::submissionSourceCode');
});

$routes->group('admin', ['filter' => 'group:admin'], static function($routes) {
    $routes->get('dashboard', 'AdminController::index');
    $routes->get('seminar', 'AdminController::seminar');
    $routes->get('finance', 'AdminController::dashboardFinance');
    $routes->get('finance/seminar', 'AdminController::financeSeminar');
    $routes->get('finance/lomba', 'AdminController::financeLomba');
    $routes->get('detail-seminar/(:segment)', 'AdminController::detailSeminar/$1');
    $routes->get('lomba/(:segment)', 'AdminController::lomba/$1');
    $routes->get('seminar/add', 'AdminController::addSeminar');
    $routes->post('seminar/add', 'AdminController::addSeminar');
    $routes->get('seminar/create-tiket/(:segment)', 'AdminController::createTiket/$1');
    $routes->get('seminar/download-tiket/(:segment)', 'AdminController::downloadTiket/$1');
    $routes->get('user/(:segment)', 'AdminController::berkasUser/$1');
    $routes->get('terima-berkas/(:segment)', 'AdminController::terimaBerkas/$1');
    $routes->get('tolak-berkas/(:segment)', 'AdminController::tolakBerkas/$1');
    $routes->get('detail-tim/(:segment)', 'AdminController::detailTim/$1');
    $routes->get('download/(:segment)', 'AdminController::downloadBerkas/$1');
});

$routes->get('download/(:segment)', 'MainController::downloadTemplate/$1');

$routes->group('api/v1', static function($routes) {
    $routes->post('notification-handler', 'ApiController::notificationHandler');
});

service('auth')->routes($routes);

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
