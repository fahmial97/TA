<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['ruang/data-booking'] = 'ruang/dataBooking';
$route['admin/jadwal-ruang'] = 'admin/jadwalRuang';
$route['profile/edit-admin/(:any)'] = 'profile/edit_admin/$1';
$route['admin/tambah-admin'] = 'admin/addAdmin';
$route['admin/list-admin'] = 'admin/admin';
$route['admin/validasi'] = 'validasi/index';
$route['admin/tambah-ruang'] = 'admin/addRuang';
$route['admin/edit-ruang/(:any)'] = 'admin/edit_ruang/$1';
$route['admin/histori-peminjaman'] = 'admin/index';
$route['admin/histori-peminjaman/(:any)'] = 'admin/index/$1';
$route['auth/login-admin'] = 'auth/loginAdmin';
$route['profile/edit/(:any)'] = 'profile/getDataEdit/$1';
$route['404_override'] = 'blocked/tolak';
$route['translate_uri_dashes'] = FALSE;
