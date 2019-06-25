<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

$route['default_controller'] = 'Auth/login';

// Auth (Kantor,Finance,Gudang,Hrd)
$route['login']['get'] = 'Auth/login';
$route['checklogin']['get'] = 'Auth/checklogin';
$route['logout']['get'] = 'Auth/logout';

// Auth Teknisi
$route['teknisi/login']['get'] = 'teknisi/Dashboard/login';
$route['teknisi/checklogin']['get'] = 'teknisi/Dashboard/checklogin';
$route['teknisi/logout']['get'] = 'teknisi/Dashboard/logout';

# KANTOR
    $route['kantor']['get'] = 'kantor/Dashboard/index';
    
    # customer
    $route['kantor/customer']['get'] = 'kantor/Customer/index';
    $route['kantor/customer/getdata']['get'] = 'kantor/Customer/getdata';
    $route['kantor/customer/getdataac/(:num)']['get'] = 'kantor/Customer/getdataac/$1';
    $route['kantor/customer/tambah']['get'] = 'kantor/Customer/tambahdata';
    $route['kantor/customer/tambahsubmit']['post'] = 'kantor/Customer/store';
    $route['kantor/customer/edit/(:num)']['get'] = 'kantor/Customer/edit/$1';
    $route['kantor/customer/editsubmit']['post'] = 'kantor/Customer/update';
    $route['kantor/customer/rincian/(:num)']['get'] = 'kantor/Customer/rincian/$1';
    $route['kantor/customer/riwayat/(:num)']['get'] = 'kantor/Customer/riwayat/$1';
    
    # order
    $route['kantor/order/spk-pemasangan']['get'] = 'kantor/Pesanan/spk_pemasangan_index';
    $route['kantor/order/spk-service']['get'] = 'kantor/Pesanan/spk_service_index';
    $route['kantor/order/spk-free']['get'] = 'kantor/Pesanan/spk_free_index';
    $route['kantor/order/spk-komplain']['get'] = 'kantor/Pesanan/spk_komplain_index';
    $route['kantor/order/spk-survey']['get'] = 'kantor/Pesanan/spk_survey_index';
    
    #penawaran
    $route['kantor/penawaran']['get'] = 'kantor/Penawaran/index';
    
    #stock
    $route['kantor/stock']['get'] = 'kantor/stock/index';
    
    #price
    $route['kantor/price']['get'] = 'kantor/price/index';

# FINANCE

    # Invoice Masuk
    $route['finance/invoice/masuk']['get'] = 'finance/InvoiceMasuk/index'; # Dashboard
    $route['finance/invoice/masuk/getdata']['post'] = 'finance/InvoiceMasuk/getdata';
    $route['finance/invoice/masuk/tambah']['get'] = 'finance/InvoiceMasuk/tambah';
    $route['finance/invoice/masuk/tambahsubmit']['post'] = 'finance/InvoiceMasuk/store';
    $route['finance/invoice/masuk/rincian/(:num)']['get'] = 'finance/InvoiceMasuk/rincian/$1';
    $route['finance/invoice/masuk/hapus']['post'] = 'finance/InvoiceMasuk/hapus';
    
    $route['finance/invoice/masuk/getsatuan']['post'] = 'finance/Stock/getsatuan';


    # Invoice Keluar
    $route['finance/invoice/keluar/barang']['get'] = 'finance/InvoiceKeluar/barang_index';
    $route['finance/invoice/keluar/material']['get'] = 'finance/InvoiceKeluar/material_index';

    # Master Stock
    $route['finance/stock']['get'] = 'finance/stock/index';
    $route['finance/stock/getdatatoko']['post'] = 'finance/stock/getdatatoko';
    $route['finance/stock/rincian/(:num)']['get'] = 'finance/stock/rincian/$1';

    # Manajemen Harga
    $route['finance/price']['get'] = 'finance/price/index';

# HRD

    $route['hrd'] = 'hrd/Dashboard/index';

    # Manajemen
    $route['hrd/manajemen/penugasan']['get'] = 'hrd/manajemen/penugasan'; // penugasan
    $route['hrd/manajemen/user']['get'] = 'hrd/manajemen/user'; // user

    # Pelanggan
    $route['hrd/customer/kepuasan']['get'] = 'hrd/customer/kepuasan'; // kepuasan

# GUDANG

    $route['gudang'] = 'gudang/Dashboard/index';

    # Barang
    $route['gudang/barang/masuk']['get'] = 'gudang/Barang/masuk'; # masuk
    $route['gudang/barang/masuk/getdata']['post'] = 'gudang/Barang/getdata'; # masuk
    $route['gudang/barang/masuk/proses/(:num)']['get'] = 'gudang/Barang/proses/$1'; # masuk
    $route['gudang/barang/masuk/proses/simpan']['post'] = 'gudang/Barang/simpan'; # masuk

    # Surat
    $route['gudang/surat/jalan']['get'] = 'gudang/surat/jalan'; # jalan

    # Material
    $route['gudang/material/keluar']['get'] = 'gudang/material/keluar'; # pengeluaran

    # Inventory
    $route['gudang/inventory']['get'] = 'gudang/inventory/index'; # list

    # Stock
    $route['gudang/stock/manajemen']['get'] = 'gudang/stock/manajemen';
    $route['gudang/stock/master']['get'] = 'gudang/stock/master';
    $route['gudang/stock/master/tambahsubmit']['post'] = 'gudang/stock/store';
    $route['gudang/stock/master/getdata']['get'] = 'gudang/stock/getdatamaster';
    $route['gudang/stock/master/edit/(:num)']['get'] = 'gudang/stock/edit/$1';
    $route['gudang/stock/master/editsubmit']['post'] = 'gudang/stock/editsubmit';
    $route['gudang/stock/master/hapus']['post'] = 'gudang/stock/masterhapus';

# TEKNISI

    $route['teknisi'] = 'teknisi/Dashboard/index';

// =========================================================
$route['translate_uri_dashes'] = FALSE;