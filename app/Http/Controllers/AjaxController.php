<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
	public function ajaxlayhoadon(Request $req)
	{
		$out = '';

		$chitiethoadon = \App\ChiTietHoaDon::where('idhd', $req->key)->get();

		if ($chitiethoadon) {
			$out = '<option>Chọn sản phẩm<option>';
			foreach ($chitiethoadon as $key => $value) {
				$sanpham = \App\SanPham::where('idsp', $value['idsp'])->first();
				$out .= '<option value="'.$value['idcthd'].'">'.$sanpham->tensp.'</option>';
			}
			echo $out;
		}
	}

	public function ajaxlaysoluong(Request $req)
	{
		$soluongcuasanpham = \App\ChiTietHoaDon::where('idcthd', $req->key2)->first();
		echo $soluongcuasanpham->soluong;
	}

	public function ajaxlaydvt(Request $req)
	{
		$chitiethoadon = \App\ChiTietHoaDon::where('idcthd', $req->key2)->first();
		$sanpham = \App\SanPham::where('idsp', $chitiethoadon->idsp)->first();
		$donvitinh = \App\DonViTinh::where('iddvt', $sanpham->iddvt)->first();
		echo $donvitinh->iddvt;
	}
}
