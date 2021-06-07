<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';

$route['admin'] = 'admin/Dashboard';

// Admin

// Auth Admin
$route['admin/login']   = 'admin/Auth/index';
$route['admin/logout']  = 'admin/Dashboard/logout';

// Admin Pendaftaran
$route['admin/pendaftaran/form/(:num)']         = 'admin/Form/index/$1';
$route['admin/pendaftaran/form/add/(:num)']     = 'admin/Form/add/$1';
$route['admin/pendaftaran/form/edit/(:num)']    = 'admin/Form/edit/$1';
$route['admin/pendaftaran/form/delete/(:num)']  = 'admin/Form/delete/$1';
$route['admin/pendaftaran/form/print/(:num)']   = 'admin/Form/print/$1';

// Users

// Auth Users
$route['homepage']  = 'users/Auth/index';
$route['login']     = 'users/Auth/login';
// $route['login']     = 'users/Auth/index';
$route['logout']    = 'users/Profile/logout';
$route['register']  = 'users/Auth/register';

// Profile Users
$route['profile']               = 'users/Profile';
$route['profile/pendaftaran']   = 'users/Pendaftaran';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
