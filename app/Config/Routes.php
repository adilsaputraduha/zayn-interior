<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Front
$routes->get('/', 'FrontHomeController::index');
$routes->post('/login/ceklogin', 'FrontHomeController::ceklogin');
$routes->post('/register/save', 'FrontHomeController::register');
$routes->get('/logout', 'FrontHomeController::logout');

$routes->get('/keranjang', 'FrontHomeController::keranjang', ['filter' => 'authfront']);
$routes->post('/keranjang/save', 'FrontHomeController::keranjangsave', ['filter' => 'authfront']);
$routes->post('/keranjang/detail-index', 'FrontHomeController::detailindex', ['filter' => 'authfront']);
$routes->post('/keranjang/detail-update', 'FrontHomeController::detailupdate', ['filter' => 'authfront']);
$routes->post('/keranjang/detail-delete', 'FrontHomeController::detaildelete', ['filter' => 'authfront']);
$routes->post('/keranjang/save-transaksi', 'FrontHomeController::savetransaksi', ['filter' => 'authfront']);
$routes->get('/pemesanan/faktur/(:segment)', 'FrontHomeController::faktur/$1', ['filter' => 'authfront']);

$routes->get('/pesanan-saya', 'FrontHomeController::pesanansaya', ['filter' => 'authfront']);
$routes->post('/pembayaran/save', 'FrontHomeController::pembayaran', ['filter' => 'authfront']);
$routes->post('/pembayaran/pelunasan', 'FrontHomeController::pelunasan', ['filter' => 'authfront']);

// Home Admin
$routes->get('/admin', 'HomeController::index', ['filter' => 'auth']);
// Login
$routes->get('/admin/login', 'LoginController::index');
$routes->post('/admin/login/ceklogin', 'LoginController::ceklogin');
$routes->get('/admin/logout', 'LoginController::logout', ['filter' => 'auth']);
// User
$routes->get('/admin/user', 'UserController::index', ['filter' => 'auth']);
$routes->post('/admin/user/save', 'UserController::save', ['filter' => 'auth']);
$routes->post('/admin/user/edit', 'UserController::edit', ['filter' => 'auth']);
$routes->post('/admin/user/delete', 'UserController::delete', ['filter' => 'auth']);
$routes->get('/admin/user/report', 'UserController::report', ['filter' => 'auth']);
// Pelanggan
$routes->get('/admin/pelanggan', 'PelangganController::index', ['filter' => 'auth']);
$routes->post('/admin/pelanggan/save', 'PelangganController::save', ['filter' => 'auth']);
$routes->post('/admin/pelanggan/edit', 'PelangganController::edit', ['filter' => 'auth']);
$routes->post('/admin/pelanggan/delete', 'PelangganController::delete', ['filter' => 'auth']);
$routes->get('/admin/pelanggan/report', 'PelangganController::report', ['filter' => 'auth']);
// Supplier
$routes->get('/admin/supplier', 'SupplierController::index', ['filter' => 'auth']);
$routes->post('/admin/supplier/save', 'SupplierController::save', ['filter' => 'auth']);
$routes->post('/admin/supplier/edit', 'SupplierController::edit', ['filter' => 'auth']);
$routes->post('/admin/supplier/delete', 'SupplierController::delete', ['filter' => 'auth']);
$routes->get('/admin/supplier/report', 'SupplierController::report', ['filter' => 'auth']);
// Kategori
$routes->get('/admin/kategori', 'KategoriController::index', ['filter' => 'auth']);
$routes->post('/admin/kategori/save', 'KategoriController::save', ['filter' => 'auth']);
$routes->post('/admin/kategori/edit', 'KategoriController::edit', ['filter' => 'auth']);
$routes->post('/admin/kategori/delete', 'KategoriController::delete', ['filter' => 'auth']);
$routes->get('/admin/kategori/report', 'KategoriController::report', ['filter' => 'auth']);
// Interior
$routes->get('/admin/interior', 'InteriorController::index', ['filter' => 'auth']);
$routes->post('/admin/interior/save', 'InteriorController::save', ['filter' => 'auth']);
$routes->post('/admin/interior/edit', 'InteriorController::edit', ['filter' => 'auth']);
$routes->post('/admin/interior/delete', 'InteriorController::delete', ['filter' => 'auth']);
$routes->get('/admin/interior/report', 'InteriorController::report', ['filter' => 'auth']);
$routes->get('/admin/interior/tambah', 'InteriorController::add', ['filter' => 'auth']);
$routes->get('/admin/interior/update/(:segment)', 'InteriorController::update/$1', ['filter' => 'auth']);
$routes->post('/admin/interior/detail-index', 'InteriorController::detailindex', ['filter' => 'auth']);
$routes->post('/admin/interior/detail-save', 'InteriorController::detailsave', ['filter' => 'auth']);
$routes->post('/admin/interior/detail-delete', 'InteriorController::detaildelete', ['filter' => 'auth']);
// Bahan Baku
$routes->get('/admin/bahanbaku', 'BahanBakuController::index', ['filter' => 'auth']);
$routes->post('/admin/bahanbaku/save', 'BahanBakuController::save', ['filter' => 'auth']);
$routes->post('/admin/bahanbaku/edit', 'BahanBakuController::edit', ['filter' => 'auth']);
$routes->post('/admin/bahanbaku/delete', 'BahanBakuController::delete', ['filter' => 'auth']);
$routes->get('/admin/bahanbaku/report', 'BahanBakuController::report', ['filter' => 'auth']);
// Pemesanan
$routes->get('/admin/pemesanan', 'PemesananController::index', ['filter' => 'auth']);
$routes->get('/admin/pemesanan/tambah', 'PemesananController::add', ['filter' => 'auth']);
$routes->get('/admin/pemesanan/update/(:segment)', 'PemesananController::update/$1', ['filter' => 'auth']);
$routes->post('/admin/pemesanan/detail-index', 'PemesananController::detailindex', ['filter' => 'auth']);
$routes->post('/admin/pemesanan/detail-save', 'PemesananController::detailsave', ['filter' => 'auth']);
$routes->post('/admin/pemesanan/detail-delete', 'PemesananController::detaildelete', ['filter' => 'auth']);
$routes->post('/admin/pemesanan/save', 'PemesananController::save', ['filter' => 'auth']);
$routes->post('/admin/pemesanan/edit', 'PemesananController::edit', ['filter' => 'auth']);
$routes->post('/admin/pemesanan/status', 'PemesananController::status', ['filter' => 'auth']);
$routes->get('/admin/pemesanan/faktur/(:segment)', 'PemesananController::faktur/$1', ['filter' => 'auth']);
// Pembelian
$routes->get('/admin/pembelian', 'PembelianController::index', ['filter' => 'auth']);
$routes->get('/admin/pembelian/tambah', 'PembelianController::add', ['filter' => 'auth']);
$routes->get('/admin/pembelian/update/(:segment)', 'PembelianController::update/$1', ['filter' => 'auth']);
$routes->post('/admin/pembelian/detail-index', 'PembelianController::detailindex', ['filter' => 'auth']);
$routes->post('/admin/pembelian/detail-save', 'PembelianController::detailsave', ['filter' => 'auth']);
$routes->post('/admin/pembelian/detail-delete', 'PembelianController::detaildelete', ['filter' => 'auth']);
$routes->post('/admin/pembelian/save', 'PembelianController::save', ['filter' => 'auth']);
$routes->post('/admin/pembelian/edit', 'PembelianController::edit', ['filter' => 'auth']);
$routes->get('/admin/pembelian/faktur/(:segment)', 'PembelianController::faktur/$1', ['filter' => 'auth']);
// Pembayaran
$routes->get('/admin/pembayaran', 'PembayaranController::index', ['filter' => 'auth']);
$routes->post('/admin/pembayaran/save', 'PembayaranController::save', ['filter' => 'auth']);
$routes->post('/admin/pembayaran/edit', 'PembayaranController::edit', ['filter' => 'auth']);
$routes->post('/admin/pembayaran/delete', 'PembayaranController::delete', ['filter' => 'auth']);
$routes->get('/admin/pembayaran/report', 'PembayaranController::report', ['filter' => 'auth']);
// Report
$routes->get('/admin/report', 'ReportController::index', ['filter' => 'auth']);
$routes->post('/admin/report/pemesanan', 'ReportController::reportpemesanan', ['filter' => 'auth']);
$routes->post('/admin/report/pembelian', 'ReportController::reportpembelian', ['filter' => 'auth']);
$routes->post('/admin/report/pembayaran', 'ReportController::reportpembayaran', ['filter' => 'auth']);
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
