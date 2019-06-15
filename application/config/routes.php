<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#DEFAULT STRUCTURE
$route['default_controller'] = 'account/document';
$route['404_override'] = 'account/error404';
$route['translate_uri_dashes'] = FALSE;

//dia nyari /login itu disini ada apa engga, kalo ada dia langsung cuss 
#ACCOUNT AREA
$route['login'] = 'account/login'; //nah ini ketemu rute buat login, langkah selanjutnya itu eksekusi program sesuai alamat kontrollernya, disini kan tertulis 'account/login', berarti nama kontrollernya account, nama fungsi/methodnya login(), sampe sini paham? yess pahamaa
//oke sekarang kita bukakontroler account, harusnya fungsi login ada sih di kontroler account
$route['logout'] = 'account/logout';
$route['dashboard'] = 'account/dashboard';
$route['profile'] = 'account/profile';
$route['document'] = 'account/document';
$route['download/(:any)'] = 'account/download/$1';
$route['detail/(:any)'] = 'account/detail/$1';

#ADMIN AREA
$route['webConf'] = 'admin/webConf';
$route['account'] = 'admin/account';
$route['detailAccount/(:any)'] = 'admin/detailAccount/$1';
$route['detailAdmin/(:any)'] = 'admin/detailAdmin/$1';


#CONTRIBUTOR AREA
$route['detailContributor/(:any)'] = 'contributor/detailContributor/$1';

#TEMPLATE
