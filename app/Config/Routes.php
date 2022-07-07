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
// $routes->setDefaultController('Home');
$routes->setDefaultController('VisitorController');
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

// $routes->get('/', 'VisitorController::index');
// $routes->post('/visitordata', 'VisitorController::get_chart_data');
$routes->get('/', 'Home::index');
$routes->post('/cari', 'Home::cari');

$routes->get('/lapak', 'Lapak::index');
$routes->get('/berita', 'News::index');
$routes->get('/berita/(:segment)/(:segment)', 'News::show/$1/$2');

$routes->get('/profile/wilayah', 'Home::wilayah');
$routes->get('/profile/peta', 'Home::peta');
$routes->post('/profile/peta/cari', 'Home::caripeta');
$routes->get('/profile/sejarah', 'Home::sejarah');

$routes->get('/pemerintahan/visimisi', 'Home::visimisi');
$routes->get('/pemerintahan/karangtaruna', 'Home::karangtaruna');
$routes->get('/pemerintahan/kelompoktani', 'Home::kelompoktani');
$routes->get('/pemerintahan/kelompokwanitatani', 'Home::kwt');
$routes->get('/pemerintahan/linmas', 'Home::linmas');
$routes->get('/pemerintahan/pkk', 'Home::pkk');
$routes->get('/pemerintahan/pokgiat', 'Home::pokgiat');
$routes->get('/pemerintahan/posyandu', 'Home::posyandu');

$routes->get('/monografi/semester_1', 'Home::monografisem1');
$routes->get('/monografi/semester_2', 'Home::monografisem2');

$routes->get('/potensi/kerajinan', 'Home::potensikerajinan');
$routes->get('/potensi/kuliner', 'Home::potensikuliner');
$routes->get('/potensi/unggulan', 'Home::potensiunggulan');

$routes->get('/produkhukum', 'Home::produkhukum');
$routes->get('/rumahdata', 'Data::rumahdata');
$routes->get('/info/(:num)', 'Data::inforumah/$1');
$routes->get('/info/edit/(:num)', 'Data::infoedit/$1');

$routes->get('/login', 'Auth::login');
$routes->post('/loginprocess', 'Auth::loginprocess');
$routes->get('/logout', 'Auth::logout');

$routes->get('/home/account', 'Auth::accountsetting');
$routes->get('/home/account/identity', 'Auth::accountidentity');
$routes->post('/home/account/identitychange', 'Auth::accountidentitychange');
$routes->get('/home/account/password', 'Auth::accountpass');
$routes->post('/home/account/passwordchange', 'Auth::accountpasschange');
$routes->get('/home/accounts', 'Auth::listakun');
$routes->get('/home/register', 'Auth::tambahakun');
$routes->post('/home/registerprocess', 'Auth::tambahakunproses');
$routes->delete('/home/accounts/delete/(:num)', 'Auth::deleteakun/$1');

$routes->get('/home', 'Auth::dashboard');

$routes->get('/home/penduduk', 'Auth::penduduk');
$routes->get('/home/penduduk/edit/(:num)', 'Auth::editpenduduk/$1');
// $routes->get('/home/penduduk/edit/(:num)/(:num)', 'Auth::editpenduduk/$1/$2');
$routes->post('/home/penduduk/editprocess/(:num)', 'Auth::editpendudukprocess/$1');
$routes->get('/home/penduduk/tambah', 'Auth::penduduktambah');
$routes->get('/home/penduduk/tambah/(:num)', 'Auth::penduduktambah/$1');
$routes->post('/home/penduduk/tambahprocess', 'Auth::penduduktambahprocess');

$routes->get('/home/pindah', 'Auth::pindah');
$routes->get('/home/pindah/cari', 'Auth::pindahcari');
$routes->post('/home/pindah/cariprocess', 'Auth::pindahcariprocess');
$routes->get('/home/pindah/tambah', 'Auth::pindahtambah');
$routes->post('/home/pindah/tambahprocess', 'Auth::pindahtambahprocess');

$routes->get('/home/meninggal', 'Auth::meninggal');
$routes->get('/home/meninggal/cari', 'Auth::meninggalcari');
$routes->post('/home/meninggal/cariprocess', 'Auth::meninggalcariprocess');
$routes->get('/home/meninggal/tambah', 'Auth::meninggaltambah');
$routes->post('/home/meninggal/tambahprocess', 'Auth::meninggaltambahprocess');

$routes->get('/home/data', 'Auth::data');

$routes->get('/home/info', 'Auth::info');
$routes->post('/home/info', 'Auth::info');
$routes->delete('home/info/edit/ubah/(:num)', 'Auth::infoeditubah/$1');
$routes->delete('home/info/edit/pindah/(:num)', 'Auth::infoeditmove/$1');
$routes->delete('/home/info/edit/died/(:num)', 'Auth::infoeditdied/$1');
$routes->get('/home/info/edit/(:num)', 'Auth::infoedit/$1');

$routes->get('/home/lapak', 'Lapak::dashboard');
$routes->get('/home/lapak/tambah', 'Lapak::tambah');
$routes->post('/home/lapak/tambahprocess', 'Lapak::tambahprocess');
$routes->get('/home/lapak/edit/(:num)', 'Lapak::edit/$1');
$routes->post('/home/lapak/editprocess/(:num)', 'Lapak::editprocess/$1');
$routes->get('/home/lapak/edit/image/(:num)', 'Lapak::editimg/$1');
$routes->post('/home/lapak/edit/imageprocess/(:num)', 'Lapak::editimgprocess/$1');
$routes->delete('/home/lapak/hapus/(:num)', 'Lapak::hapus/$1');

$routes->get('/home/berita', 'News::dashboard');
$routes->get('/home/berita/tambah', 'News::tambah');
$routes->post('/home/berita/tambahprocess', 'News::tambahprocess');
$routes->get('/home/berita/edit/(:num)', 'News::edit/$1');
$routes->post('/home/berita/editprocess/(:num)', 'News::update/$1');
$routes->get('/home/berita/edit/image/(:num)', 'News::editimage/$1');
$routes->post('/home/berita/edit/imageprocess/(:num)', 'News::updateimage/$1');
$routes->delete('/home/berita/hapus/(:num)', 'News::hapus/$1');

$routes->get('/home/widget', 'Auth::widget');
$routes->get('/home/widget/pengunguman', 'Auth::pengunguman');
$routes->post('/home/widget/pengungumanprocess', 'Auth::pengungumanprocess');
$routes->get('/home/widget/pengunguman/(:num)', 'Auth::pengungumanedit/$1');
$routes->post('/home/widget/pengunguman/edit/(:num)', 'Auth::pengungumaneditprocess/$1');
$routes->delete('/home/widget/pengunguman/hapus/(:num)', 'Auth::pengungumanhapus/$1');

$routes->get('/home/widget/videoyt', 'Auth::videoyt');
$routes->post('/home/widget/videoytprocess', 'Auth::videoytprocess');
$routes->get('/home/widget/videoyt/(:num)', 'Auth::videoytedit/$1');
$routes->post('/home/widget/videoytprocess/(:num)', 'Auth::videoyteditprocess/$1');
$routes->delete('/home/widget/videoyt/hapus/(:num)', 'Auth::videoythapus/$1');

$routes->get('/home/pictures', 'Auth::pictures');
$routes->get('/home/pictures/bigimg/add', 'Auth::bigimgadd');
$routes->post('/home/pictures/bigimg/addprocess', 'Auth::bigimgaddprocess');
$routes->get('/home/pictures/bigimg/edit/(:num)', 'Auth::bigimgedit/$1');
$routes->post('/home/pictures/bigimg/editprocess/(:num)', 'Auth::bigimgeditprocess/$1');
$routes->delete('/home/pictures/bigimg/hapus/(:num)', 'Auth::bigimgdelete/$1');

$routes->get('/home/pictures/smallimg/add', 'Auth::smallimgadd');
$routes->post('/home/pictures/smallimg/addprocess', 'Auth::smallimgaddprocess');
$routes->get('/home/pictures/smallimg/edit/(:num)', 'Auth::smallimgedit/$1');
$routes->post('/home/pictures/smallimg/editprocess/(:num)', 'Auth::smallimgeditprocess/$1');
$routes->delete('/home/pictures/smallimg/hapus/(:num)', 'Auth::smallimgdelete/$1');

$routes->post('/kritiksaranprocess', 'Home::kritiksaran');
$routes->get('/kritikdansaran', 'Home::hasilkritiksaran');
$routes->delete('/home/kritiksaran/delete/(:num)', 'Auth::kritiksarandelete/$1');



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
