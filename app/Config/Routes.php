<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index');

$routes->group('auth', function ($routes) {
    $routes->get('/', 'Auth::index');
    $routes->post('login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
});

$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    
    $routes->get('profil', 'Admin\Profil::index');
    $routes->post('profil/update', 'Admin\Profil::update');

    $routes->get('adminuser', 'Admin\AdminUser::index');
    $routes->post('adminuser/store', 'Admin\AdminUser::store');
    $routes->post('adminuser/update/(:num)', 'Admin\AdminUser::update/$1');
    $routes->get('adminuser/delete/(:num)', 'Admin\AdminUser::delete/$1');

    $routes->get('agama', 'Admin\Agama::index');
    $routes->post('agama/store', 'Admin\Agama::store');
    $routes->post('agama/update/(:num)', 'Admin\Agama::update/$1');
    $routes->get('agama/delete/(:num)', 'Admin\Agama::delete/$1');

    $routes->get('pekerjaan', 'Admin\Pekerjaan::index');
    $routes->post('pekerjaan/store', 'Admin\Pekerjaan::store');
    $routes->post('pekerjaan/update/(:num)', 'Admin\Pekerjaan::update/$1');
    $routes->get('pekerjaan/delete/(:num)', 'Admin\Pekerjaan::delete/$1');

    $routes->get('persyaratan', 'Admin\Persyaratan::index');
    $routes->post('persyaratan/store', 'Admin\Persyaratan::store');
    $routes->post('persyaratan/update/(:num)', 'Admin\Persyaratan::update/$1');
    $routes->get('persyaratan/delete/(:num)', 'Admin\Persyaratan::delete/$1');

    $routes->get('profilsekolah', 'Admin\ProfilSekolah::index');
    $routes->post('profilsekolah/update', 'Admin\ProfilSekolah::update');

    $routes->get('latarbelakang', 'Admin\LatarBelakang::index');
    $routes->post('latarbelakang/store', 'Admin\LatarBelakang::store');
    $routes->get('latarbelakang/set_active/(:num)', 'Admin\LatarBelakang::set_active/$1');
    $routes->get('latarbelakang/delete/(:num)', 'Admin\LatarBelakang::delete/$1');

    $routes->get('konfirmasi', 'Admin\Konfirmasi::index');
    $routes->get('konfirmasi/detail/(:num)', 'Admin\Konfirmasi::detail/$1');
    $routes->get('konfirmasi/approve/(:num)', 'Admin\Konfirmasi::approve/$1');
    $routes->post('konfirmasi/reject/(:num)', 'Admin\Konfirmasi::reject/$1');
    $routes->get('konfirmasi/cetak_pdf/(:num)', 'Admin\Konfirmasi::cetak_pdf/$1');
});

$routes->group('siswa', ['filter' => 'role:siswa'], function ($routes) {
    $routes->get('dashboard', 'Siswa\Dashboard::index');
    
    $routes->get('profil', 'Siswa\Profil::index');
    $routes->post('profil/update', 'Siswa\Profil::update');

    $routes->get('pendaftaran', 'Siswa\Pendaftaran::index');
    $routes->post('pendaftaran/store', 'Siswa\Pendaftaran::store');
    $routes->get('pendaftaran/cetak_pdf', 'Siswa\Pendaftaran::cetak_pdf');
});