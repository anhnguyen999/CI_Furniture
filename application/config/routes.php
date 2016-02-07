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
 |	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'index';
$route['tim_kiem'] = 'index/tim_kiem';
$route['san-pham-khuyen-mai/chi-tiet/[a-zA-Z0-9_-]*'] = 'index/san_pham_khuyen_mai';
$route['san-pham/[a-zA-Z0-9_-]*/[a-zA-Z0-9_-]*'] = 'index/san_pham_theo_loai';
$route['san-pham/[a-zA-Z0-9_-]*/[a-zA-Z0-9_-]*/[a-zA-Z0-9_-]*'] = 'index/san_pham_theo_loai';
$route['chi-tiet-san-pham/[a-zA-Z0-9_-]*'] = 'index/chi_tiet_san_pham_theo_loai';
$route['gio_hang/thong_tin'] ='gio_hang/thongtin';
$route['gio_hang/xoa'] ='gio_hang/xoa_mat_hang';
$route['gio-hang/xoa-gio-hang']='gio_hang/xoa_gio_hang';
$route['gio-hang/dat-hang']='khachhang/dathang';
$route['khach-hang/thong-tin-don-dat-hang/[0-9_-]*']='khachhang/thongtindondathang';

$route['quan-tri']='quan_tri/index';
$route['quan-tri/thoat']='quan_tri/thoat';
$route['quan-tri/dang-nhap']='quan_tri/dang_nhap';

$route['quan-tri/san-pham']='quan_tri/ds_san_pham';
$route['quan-tri/san-pham/[0-9_-]']='quan_tri/ds_san_pham';

$route['quan-tri/danh-sach-nguoi-dung'] = 'quan_tri/ds_nguoi_dung';
$route['quan-tri/nguoi-dung/them-nguoi-dung'] = 'quan_tri/them_nguoi_dung';
$route['quan-tri/san-pham/them-san-pham'] = 'quan_tri/them_san_pham';
$route['quan-tri/san-pham/cap-nhat-san-pham/[0-9_-]*']='quan_tri/update';
$route['quan-tri/san-pham/xoa-san-pham/[0-9_-]*']='quan_tri/delete';
$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;
