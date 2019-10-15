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

# SUPER ADMIN

    $route['admin/dashboard']['get'] = 'master/dashboard/index';

    # *KANTOR*

        # Customer
        $route['admin/kantor/customer']['get'] = 'master/kantor/Customer/index';
        $route['admin/kantor/customer/getdata']['get'] = 'master/kantor/Customer/getdata';
        $route['admin/kantor/customer/getdataac/(:num)']['get'] = 'master/kantor/Customer/getdataac/$1';
        $route['admin/kantor/customer/tambah']['get'] = 'master/kantor/Customer/tambahdata';
        $route['admin/kantor/customer/tambahsubmit']['post'] = 'master/kantor/Customer/store';
        $route['admin/kantor/customer/edit/(:num)']['get'] = 'master/kantor/Customer/edit/$1';
        $route['admin/kantor/customer/editsubmit']['post'] = 'master/kantor/Customer/update';
        $route['admin/kantor/customer/rincian/(:num)']['get'] = 'master/kantor/Customer/rincian/$1';
        $route['admin/kantor/customer/riwayat/(:num)']['get'] = 'master/kantor/Customer/riwayat/$1';

        # Penawaran
        $route['admin/kantor/penawaran']['get'] = 'master/kantor/Penawaran/index';
        $route['admin/kantor/penawaran/create']['get'] = 'master/kantor/Penawaran/create';
        $route['admin/kantor/penawaran/rincian/(:any)']['get'] = 'master/kantor/Penawaran/rincian/$1';
        $route['admin/kantor/penawaran/print/(:any)']['get'] = 'master/kantor/Penawaran/print/$1';
        $route['admin/kantor/penawaran/simpan']['post'] = 'master/kantor/Penawaran/store';

        #stock
        $route['admin/kantor/stock']['get'] = 'master/kantor/stock/index';
        $route['admin/kantor/stock/rincian/(:any)']['get'] = 'master/kantor/stock/rincian_kantor/$1';
        $route['admin/kantor/stock/rincian_barang/(:any)']['get'] = 'master/kantor/stock/rincian_barang/$1';

        #price
        $route['admin/kantor/price']['get'] = 'master/kantor/price/index';
        $route['getpriceitem']['post'] = 'kantor/price/getpriceitem';
        $route['getpricejasa']['post'] = 'kantor/price/getpricejasa';

        $route['admin/kantor/price/submit_barang']['get'] = 'master/kantor/price/submit_barang';
        $route['admin/kantor/price/submit_jasa']['get'] = 'master/kantor/price/submit_jasa';

        $route['admin/kantor/getmodel']['post'] = 'master/kantor/penawaran/getmodel';

    # *FINANCE*

        # Invoice Masuk
        $route['admin/finance/invoice/masuk']['get'] = 'master/finance/InvoiceMasuk/index'; # Dashboard
        $route['admin/finance/invoice/masuk/getdata']['post'] = 'master/finance/InvoiceMasuk/getdata';
        $route['admin/finance/invoice/masuk/tambah']['get'] = 'master/finance/InvoiceMasuk/tambah';
        $route['admin/finance/invoice/masuk/tambahsubmit']['post'] = 'master/finance/InvoiceMasuk/store';
        $route['admin/finance/invoice/masuk/updatessubmit']['post'] = 'master/finance/InvoiceMasuk/updates';
        $route['admin/finance/invoice/masuk/rincian/(:any)']['get'] = 'master/finance/InvoiceMasuk/rincian/$1';
        $route['admin/finance/invoice/masuk/edit/(:any)']['get'] = 'master/finance/InvoiceMasuk/edit/$1';
        $route['admin/finance/invoice/masuk/hapus']['post'] = 'master/finance/InvoiceMasuk/hapus';
        $route['admin/finance/invoice/masuk/hapusitem']['post'] = 'master/finance/InvoiceMasuk/hapusitem';
        $route['admin/finance/invoice/masuk/tambahitem']['post'] = 'master/finance/InvoiceMasuk/tambahitem';
        $route['admin/finance/invoice/masuk/updateitem']['post'] = 'master/finance/InvoiceMasuk/updateitem';

        $route['admin/finance/invoice/masuk/getsatuan']['post'] = 'master/finance/Stock/getsatuan';


        # Invoice Keluar
        $route['admin/finance/invoice/keluar/barang']['get'] = 'master/finance/InvoiceKeluar/barang_index';
        $route['admin/finance/invoice/keluar/material']['get'] = 'master/finance/InvoiceKeluar/material_index';

        # Master Stock
        $route['admin/finance/stock']['get'] = 'master/finance/stock/index';
        $route['admin/finance/stock/getdatatoko']['post'] = 'master/finance/stock/getdatatoko';
        $route['admin/finance/stock/rincian/(:any)']['get'] = 'master/finance/stock/rincian_kantor/$1';
        $route['admin/finance/stock/rincian_barang/(:any)']['get'] = 'master/finance/stock/rincian_barang/$1';

        # Manajemen Harga
        $route['admin/finance/price']['get'] = 'master/finance/price/index';


    # *HRD*

        $route['master/hrd'] = 'master/hrd/Dashboard/index';

        # Manajemen
        $route['master/hrd/manajemen/penugasan']['get'] = 'master/hrd/manajemen/penugasan'; // penugasan
        $route['master/hrd/manajemen/user']['get'] = 'master/hrd/manajemen/user'; // user

        # Pelanggan
        $route['master/hrd/customer/kepuasan']['get'] = 'master/hrd/customer/kepuasan'; // kepuasan

    # *GUDANG*

        $route['gudang'] = 'gudang/Dashboard/index';

        # Barang
        $route['admin/gudang/barang/masuk']['get'] = 'master/gudang/Barang/masuk'; # masuk
        $route['admin/gudang/barang/masuk/getdata']['post'] = 'master/gudang/Barang/getdata'; # masuk
        $route['admin/gudang/barang/masuk/proses/(:any)']['get'] = 'master/gudang/Barang/proses/$1'; # masuk
        $route['admin/gudang/barang/masuk/proses/simpan']['post'] = 'master/gudang/Barang/simpan'; # masuk

        # Material
        $route['admin/gudang/material/keluar']['get'] = 'master/gudang/material/keluar'; # pengeluaran

        # Inventory
        $route['admin/gudang/inventory']['get'] = 'master/gudang/inventory/index'; # list
        $route['admin/gudang/inventory/tambah']['get'] = 'master/gudang/inventory/tambah';
        $route['admin/gudang/inventory/barcode/(:any)']['post'] = 'master/gudang/inventory/barcode/$1';
        $route['admin/gudang/inventory/edit/(:any)']['get'] = 'master/gudang/inventory/edit/$1';
        $route['admin/gudang/inventory/update']['post'] = 'master/gudang/inventory/update';
        $route['admin/gudang/inventory/hapus']['post'] = 'master/gudang/inventory/hapus';
        $route['admin/gudang/inventory/pinjam']['post'] = 'master/gudang/inventory/pinjam';
        $route['admin/gudang/inventory/submit']['post'] = 'master/gudang/inventory/submit';
        $route['admin/gudang/inventory/kembalikan_pinjam']['post'] = 'master/gudang/inventory/kembalikan_pinjam';

        # Stock
        $route['admin/gudang/stock/manajemen']['get'] = 'master/gudang/stock/manajemen';
        $route['admin/gudang/stock/rincian/(:any)']['get'] = 'master/gudang/stock/rincian_kantor/$1';
        $route['admin/gudang/stock/rincian_barang/(:any)']['get'] = 'master/gudang/stock/rincian_barang/$1';

        $route['admin/gudang/stock/master']['get'] = 'master/gudang/stock/master';
        $route['admin/gudang/stock/master/tambahsubmit']['post'] = 'master/gudang/stock/store';
        $route['admin/gudang/stock/master/getdata'] = 'master/gudang/stock/getdatamaster';
        $route['admin/gudang/stock/master/edit/(:num)']['get'] = 'master/gudang/stock/edit/$1';
        $route['admin/gudang/stock/master/editsubmit']['post'] = 'master/gudang/stock/editsubmit';
        $route['admin/gudang/stock/master/hapus']['post'] = 'master/gudang/stock/masterhapus';



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
    $route['kantor/order/spk-pemasangan/tambah']['get'] = 'kantor/Pesanan/spk_pemasangan_tambah';
    $route['kantor/order/spk-pemasangan/edit/(:num)']['get'] = 'kantor/Pesanan/spk_pemasangan_edit/$1';
    $route['spk-pemasangan/getdata']['post'] = 'kantor/Pesanan/spk_pemasangan_getdata';
    $route['getcustomer']['post'] = 'kantor/Pesanan/getcustomer';

    $route['spk_pemasangan_submit']['post'] = 'kantor/Pesanan/spk_pemasangan_submit';
    $route['spk_pemasangan_edit_submit']['post'] = 'kantor/Pesanan/spk_pemasangan_edit_submit';

    $route['kantor/order/spk-service']['get'] = 'kantor/Pesanan/spk_service_index';
    $route['kantor/order/spk-free']['get'] = 'kantor/Pesanan/spk_free_index';
    $route['kantor/order/spk-komplain']['get'] = 'kantor/Pesanan/spk_komplain_index';
    $route['kantor/order/spk-survey']['get'] = 'kantor/Pesanan/spk_survey_index';

    #penawaran
    $route['kantor/penawaran']['get'] = 'kantor/Penawaran/index';
    $route['kantor/penawaran/create']['get'] = 'kantor/Penawaran/create';
    $route['kantor/penawaran/rincian/(:any)']['get'] = 'kantor/Penawaran/rincian/$1';
    $route['kantor/penawaran/print/(:any)']['get'] = 'kantor/Penawaran/print/$1';
    $route['getalldatapenawaran']['post'] = 'kantor/Penawaran/getalldata';
    $route['kantor/penawaran/simpan']['post'] = 'kantor/Penawaran/store';

    #stock
    $route['kantor/stock']['get'] = 'kantor/stock/index';
    $route['kantor/stock/rincian/(:any)']['get'] = 'kantor/stock/rincian_kantor/$1';
    $route['kantor/stock/rincian_barang/(:any)']['get'] = 'kantor/stock/rincian_barang/$1';

    #price
    $route['kantor/price']['get'] = 'kantor/price/index';
    $route['getpriceitem']['post'] = 'kantor/price/getpriceitem';
    $route['getpricejasa']['post'] = 'kantor/price/getpricejasa';

    $route['kantor/price/submit_barang']['get'] = 'kantor/price/submit_barang';
    $route['kantor/price/submit_jasa']['get'] = 'kantor/price/submit_jasa';

    $route['kantor/getmodel']['post'] = 'kantor/penawaran/getmodel';

# FINANCE

    # Invoice Masuk
    $route['finance/invoice/masuk']['get'] = 'finance/InvoiceMasuk/index'; # Dashboard
    $route['finance/invoice/masuk/getdata']['post'] = 'finance/InvoiceMasuk/getdata';
    $route['finance/invoice/masuk/tambah']['get'] = 'finance/InvoiceMasuk/tambah';
    $route['finance/invoice/masuk/tambahsubmit']['post'] = 'finance/InvoiceMasuk/store';
    $route['finance/invoice/masuk/updatessubmit']['post'] = 'finance/InvoiceMasuk/updates';
    $route['finance/invoice/masuk/rincian/(:any)']['get'] = 'finance/InvoiceMasuk/rincian/$1';
    $route['finance/invoice/masuk/edit/(:any)']['get'] = 'finance/InvoiceMasuk/edit/$1';
    $route['finance/invoice/masuk/hapus']['post'] = 'finance/InvoiceMasuk/hapus';
    $route['finance/invoice/masuk/hapusitem']['post'] = 'finance/InvoiceMasuk/hapusitem';
    $route['finance/invoice/masuk/tambahitem']['post'] = 'finance/InvoiceMasuk/tambahitem';
    $route['finance/invoice/masuk/updateitem']['post'] = 'finance/InvoiceMasuk/updateitem';

    $route['finance/invoice/masuk/getsatuan']['post'] = 'finance/Stock/getsatuan';


    # Invoice Keluar
    $route['finance/invoice/keluar/barang']['get'] = 'finance/InvoiceKeluar/barang_index';
    $route['finance/invoice/keluar/material']['get'] = 'finance/InvoiceKeluar/material_index';

    # Invoice Keluar New
    $route['finance/invoice/keluar2/pembuatan']['get'] = 'finance/InvoiceKeluar2/pembuatan';
    $route['finance/invoice/keluar2/monitoring']['get'] = 'finance/InvoiceKeluar2/monitoring';

    # Master Stock
    $route['finance/stock']['get'] = 'finance/stock/index';
    $route['finance/stock/getdatatoko']['post'] = 'finance/stock/getdatatoko';
    $route['finance/stock/rincian/(:any)']['get'] = 'finance/stock/rincian_kantor/$1';
    $route['finance/stock/rincian_barang/(:any)']['get'] = 'finance/stock/rincian_barang/$1';

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
    $route['gudang/barang/masuk/proses/(:any)']['get'] = 'gudang/Barang/proses/$1'; # masuk
    $route['gudang/barang/masuk/proses/simpan']['post'] = 'gudang/Barang/simpan'; # masuk

    # Surat
    $route['gudang/surat/jalan']['get'] = 'gudang/surat/jalan'; # jalan

    # Material
    $route['gudang/material/keluar']['get'] = 'gudang/material/keluar'; # pengeluaran

    # Inventory
    $route['gudang/inventory']['get'] = 'gudang/inventory/index'; # list
    $route['gudang/inventory/tambah']['get'] = 'gudang/inventory/tambah';
    $route['gudang/inventory/barcode/(:any)']['post'] = 'gudang/inventory/barcode/$1';
    $route['gudang/inventory/edit/(:any)']['get'] = 'gudang/inventory/edit/$1';
    $route['gudang/inventory/update']['post'] = 'gudang/inventory/update';
    $route['gudang/inventory/hapus']['post'] = 'gudang/inventory/hapus';
    $route['gudang/inventory/pinjam']['post'] = 'gudang/inventory/pinjam';
    $route['gudang/inventory/submit']['post'] = 'gudang/inventory/submit';
    $route['gudang/inventory/kembalikan_pinjam']['post'] = 'gudang/inventory/kembalikan_pinjam';

    # Stock
    $route['gudang/stock/manajemen']['get'] = 'gudang/stock/manajemen';
    $route['gudang/stock/rincian/(:any)']['get'] = 'gudang/stock/rincian_kantor/$1';
    $route['gudang/stock/rincian_barang/(:any)']['get'] = 'gudang/stock/rincian_barang/$1';

    $route['gudang/stock/master']['get'] = 'gudang/stock/master';
    $route['gudang/stock/master/tambahsubmit']['post'] = 'gudang/stock/store';
    $route['gudang/stock/master/getdata'] = 'gudang/stock/getdatamaster';
    $route['gudang/stock/master/edit/(:num)']['get'] = 'gudang/stock/edit/$1';
    $route['gudang/stock/master/editsubmit']['post'] = 'gudang/stock/editsubmit';
    $route['gudang/stock/master/hapus']['post'] = 'gudang/stock/masterhapus';

# TEKNISI

    $route['teknisi'] = 'teknisi/Dashboard/index';

// =========================================================
$route['translate_uri_dashes'] = TRUE;
