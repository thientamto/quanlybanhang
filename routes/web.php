<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('banhang', function () {
//     return view('admin.banhang.banhang');
// });

Route::get('admin/{id}',['as'=> 'admin', 'uses'=>'AdminController@index']);
Route::get('login', ['as'=> 'login', 'uses'=>'AdminController@login']);
Route::get('logout', ['as'=> 'logout', 'uses'=>'AdminController@logout']);
Route::post('login', ['as'=> 'login', 'uses'=>'AdminController@postlogin']);
Route::get('dangky', 'AdminController@dangky');
Route::post('dangky', ['as'=> 'dangky', 'uses'=>'AdminController@postdangky']);

Route::group(['prefix'=>''],function()
	{
		Route::get('them-gio-hang/{id}','CartController@themgiohang')->name('them-gio-hang');
		Route::get('xoa-gio-hang','CartController@xoagiohang')->name('xoa-gio-hang');
		Route::get('xoa-mot-san-pham-gio-hang','CartController@xoamotsanphamgiohang')->name('xoa-mot-san-pham-gio-hang');
		Route::get('sua-mot-san-pham-gio-hang','CartController@suamotsanphamgiohang')->name('sua-mot-san-pham-gio-hang');
		Route::post('luu-gio-hang','CartController@luugiohang')->name('luu-gio-hang');
		
	});


Route::group(['prefix'=>''],function()
	{

		Route::get('nhap-kho','NhapKhoController@nhapkho')->name('nhap-kho');
		Route::post('nhap-kho','NhapKhoController@postnhapkho')->name('post-nhap-kho');
		Route::post('luu-phieu-nhap-kho','NhapKhoController@luuphieunhapkho')->name('luu-phieu-nhap-kho');

		Route::get('xoa-all-cart-nhap-kho','NhapKhoController@xoaallcartnhapkho')->name('xoa-all-cart-nhap-kho');
		Route::get('xoa-one-cart-nhap-kho/{id}','NhapKhoController@xoaonecartnhapkho')->name('xoa-one-cart-nhap-kho');
		Route::get('sua-one-cart-nhap-kho','NhapKhoController@suaonecartnhapkho')->name('sua-one-cart-nhap-kho');
		
	});

Route::group(['prefix'=>''],function()
	{
		Route::get('them-san-pham-tra-hang','TraHangController@themsanphamtrahang')->name('them-san-pham-tra-hang');
	});


Route::group(['prefix'=>''],function()
	{
		Route::get('ajax-layhoadon','AjaxController@ajaxlayhoadon')->name('ajax-layhoadon');
		Route::get('ajax-laysoluong','AjaxController@ajaxlaysoluong')->name('ajax-laysoluong');
		Route::get('ajax-laydvt','AjaxController@ajaxlaydvt')->name('ajax-laydvt');
	});




Route::group(['prefix'=>'admin'],function()
{
	// // Bán hàng
	Route::group(['prefix'=>'banhang'],function()
	{
		Route::get('banhang','BanHangController@banhang');
	});

	// Tổ chức
	Route::group(['prefix'=>'tochuc'],function()
	{
		Route::get('danhsach','ToChucController@getDanhSach');
		Route::get('them','ToChucController@getThem');
		Route::post('them','ToChucController@postThem');
		Route::get('sua/{idtc}','ToChucController@getSua');
		Route::post('sua/{idtc}','ToChucController@postSua');
		Route::get('xoa/{idtc}','ToChucController@getXoa');
	});

	// Nhà cung cấp	
	Route::group(['prefix'=>'nhacungcap'],function()
	{
		Route::get('danhsach','NhaCungCapController@getDanhSach');
		Route::get('them','NhaCungCapController@getThem');
		Route::post('them','NhaCungCapController@postThem');
		Route::get('sua/{idncc}','NhaCungCapController@getSua');
		Route::post('sua/{idncc}','NhaCungCapController@postSua');
		Route::get('xoa/{idncc}','NhaCungCapController@getXoa');
	});

	// Nhập kho
	Route::group(['prefix'=>'nhapkho'],function()
	{
		Route::get('danhsach','NhapKhoController@getDanhSach');
		Route::get('them','NhapKhoController@getThem');
		Route::post('them','NhapKhoController@postThem');
		Route::get('sua/{idnhap}','NhapKhoController@getSua');
		Route::post('sua/{idnhap}','NhapKhoController@postSua');
		Route::get('xoa/{idnhap}','NhapKhoController@getXoa');

		Route::get('chi-tiet-nhap/{idnhap}','NhapKhoController@chitietnhap')->name('chi-tiet-nhap');

	});

	// Chi tiết nhập
	// Route::group(['prefix'=>'chitietnhap'],function()
	// {
	// 	Route::get('danhsach','ChiTietNhapController@getDanhSach');
	// 	Route::get('them','ChiTietNhapController@getThem');
	// 	Route::post('them','ChiTietNhapController@postThem');
	// 	Route::get('sua/{idctn}','ChiTietNhapController@getSua');
	// 	Route::post('sua/{idctn}','ChiTietNhapController@postSua');
	// 	Route::get('xoa/{idctn}','ChiTietNhapController@getXoa');

	// });

	// Hóa đơn
	Route::group(['prefix'=>'hoadon'],function()
	{
		Route::get('danhsach','HoaDonController@getDanhSach');
		Route::get('them','HoaDonController@getThem');
		Route::post('them','HoaDonController@postThem');
		Route::get('sua/{idhd}','HoaDonController@getSua');
		Route::post('sua/{idhd}','HoaDonController@postSua');
		Route::get('xoa/{idhd}','HoaDonController@getXoa');

		Route::get('chi-tiet-hoa-don/{idhd}','HoaDonController@chitiethoadon')->name('chi-tiet-hoa-don');


	});

	// Chi tiết hóa đơn
	// Route::group(['prefix'=>'chitiethoadon'],function()
	// {
	// 	Route::get('danhsach','ChiTietHoaDonController@getDanhSach');
	// 	Route::get('them','ChiTietHoaDonController@getThem');
	// 	Route::post('them','ChiTietHoaDonController@postThem');
	// 	Route::get('sua/{idcthd}','ChiTietHoaDonController@getSua');
	// 	Route::post('sua/{idcthd}','ChiTietHoaDonController@postSua');
	// 	Route::get('xoa/{idcthd}','ChiTietHoaDonController@getXoa');

	// });

	// Hóa đơn ncc
	Route::group(['prefix'=>'hoadonncc'],function()
	{
		Route::get('danhsach','HoaDonNCCController@getDanhSach');
		Route::get('them','HoaDonNCCController@getThem');
		Route::post('them','HoaDonNCCController@postThem');
		Route::get('sua/{idhdncc}','HoaDonNCCController@getSua');
		Route::post('sua/{idhdncc}','HoaDonNCCController@postSua');
		Route::get('xoa/{idhdncc}','HoaDonNCCController@getXoa');

	});

	// Chi tiết hóa đơn ncc
	Route::group(['prefix'=>'chitiethoadonncc'],function()
	{
		Route::get('danhsach','ChiTietHoaDonNCCController@getDanhSach');
		Route::get('them','ChiTietHoaDonNCCController@getThem');
		Route::post('them','ChiTietHoaDonNCCController@postThem');
		Route::get('sua/{idcthdncc}','ChiTietHoaDonNCCController@getSua');
		Route::post('sua/{idcthdncc}','ChiTietHoaDonNCCController@postSua');
		Route::get('xoa/{idcthdncc}','ChiTietHoaDonNCCController@getXoa');

	});

	// Công nợ khách hàng
	Route::group(['prefix'=>'congnokh'],function()
	{
		Route::get('danhsach','CongNoKHController@getDanhSach');
		Route::get('them','CongNoKHController@getThem');
		Route::post('them','CongNoKHController@postThem');
		Route::get('sua/{idcnkh}','CongNoKHController@getSua');
		Route::post('sua/{idcnkh}','CongNoKHController@postSua');
		Route::get('xoa/{idcnkh}','CongNoKHController@getXoa');

	});

	// Công nợ nhà cung cấp
	Route::group(['prefix'=>'congnoncc'],function()
	{
		Route::get('danhsach','CongNoKHController@getDanhSachNCC');
	});

	// Trả hàng
	Route::group(['prefix'=>'trahang'],function()
	{
		Route::get('danhsach','TraHangController@getDanhSach');
		Route::get('them','TraHangController@getThem');
		Route::post('them','TraHangController@postThem');
		Route::get('sua/{idth}','TraHangController@getSua');
		Route::post('sua/{idth}','TraHangController@postSua');
		Route::get('xoa/{idth}','TraHangController@getXoa');


		Route::get('chi-tiet-tra-hang/{idth}','TraHangController@chitiettrahang')->name('chi-tiet-tra-hang');




	});

	// Chi tiết trả hàng
	// Route::group(['prefix'=>'chitiettrahang'],function()
	// {
	// 	Route::get('danhsach','ChiTietTraHangController@getDanhSach');
	// 	Route::get('them','ChiTietTraHangController@getThem');
	// 	Route::post('them','ChiTietTraHangController@postThem');
	// 	Route::get('sua/{idctth}','ChiTietTraHangController@getSua');
	// 	Route::post('sua/{idctth}','ChiTietTraHangController@postSua');
	// 	Route::get('xoa/{idctth}','ChiTietTraHangController@getXoa');

	// });

	// Đơn vị tính
	Route::group(['prefix'=>'donvitinh'],function()
	{
		Route::get('danhsach','DonViTinhController@getDanhSach');
		Route::get('them','DonViTinhController@getThem');
		Route::post('them','DonViTinhController@postThem');
		Route::get('sua/{iddvt}','DonViTinhController@getSua');
		Route::post('sua/{iddvt}','DonViTinhController@postSua');
		Route::get('xoa/{iddvt}','DonViTinhController@getXoa');

	});

	// Nhóm sản phẩm
	Route::group(['prefix' => 'nhomsanpham'], function() 
	{
        Route::get('danhsach','NhomSanPhamController@getDanhSach');
		Route::get('them','NhomSanPhamController@getThem');
		Route::post('them','NhomSanPhamController@postThem');
		Route::get('sua/{idnsp}','NhomSanPhamController@getSua');
		Route::post('sua/{idnsp}','NhomSanPhamController@postSua');
		Route::get('xoa/{idnsp}','NhomSanPhamController@getXoa');
    });

	// Nhân viên
    Route::group(['prefix'=>'nhanvien'],function()
	{
		Route::get('danhsach','NhanVienController@getDanhSach');
		Route::get('them', [
			'as' => 'them',
			'uses' => 'NhanVienController@getThem'
		]);
		// Route::get('them/{id}','NhanVienController@getThem');
		Route::post('them','NhanVienController@postThem');
		Route::get('sua/{idnv}','NhanVienController@getSua');
		Route::post('sua/{idnv}','NhanVienController@postSua');
		Route::get('xoa/{idnv}','NhanVienController@getXoa');
    });


	// Kho
    Route::group(['prefix'=>'kho'],function()
	{
		Route::get('danhsach','KhoController@getDanhSach');
		Route::get('them','KhoController@getThem');
		Route::post('them','KhoController@postThem');
		Route::get('sua/{idkho}','KhoController@getSua');
		Route::post('sua/{idkho}','KhoController@postSua');
		Route::get('xoa/{idkho}','KhoController@getXoa');
    });


	// Sản phẩm 
    Route::group(['prefix'=>'sanpham'],function()
	{
		Route::get('danhsach','SanPhamController@getDanhSach');
		Route::get('them','SanPhamController@getThem');
		Route::post('them','SanPhamController@postThem');
		Route::get('sua/{idsp}','SanPhamController@getSua');
		Route::post('sua/{idsp}','SanPhamController@postSua');
		Route::get('xoa/{idsp}','SanPhamController@getXoa');
	});


	// Khách hàng
	Route::group(['prefix'=>'khachhang'],function()
	{
		Route::get('danhsach','KhachHangController@getDanhSach');
		Route::get('them','KhachHangController@getThem');
		Route::post('them','KhachHangController@postThem');
		Route::get('sua/{idkh}','KhachHangController@getSua');
		Route::post('sua/{idlh}','KhachHangController@postSua');
		Route::get('xoa/{idkh}','KhachHangController@getXoa');
    });
});
