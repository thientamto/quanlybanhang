<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart, Auth;
class CartController extends Controller
{
    public function themgiohang(Request $req, $id)
    {
    	$sanpham = \App\SanPham::where('idsp', $id)->first();

    	$data_list = $req->session()->get('data');
		if ($data_list==null){
			$data_list=array();
		}

		$data = array(
			'id' => $sanpham->idsp,
			'tensanpham' => $sanpham->tensp,
			'giaban' => $sanpham->giaban,
			'soluong' => '1',
			'hinhanh' => $sanpham->hinh,
		);
		array_push($data_list, $data);
		$req->session()->put('data', $data_list);
  		return redirect()->back()->with('thongbao', 'them gio hang thanh cong');
    }

    public function xoagiohang(Request $req)
    {
    	$req->session()->forget('data');
  		return redirect()->back()->with('thongbao', 'xoa gio hang thanh cong');
    }

    public function luugiohang(Request $req)
    {
        $id = Auth::id();
        $check_user = \App\User::find($id);
        $tochuc = \App\ToChuc::where('id_user', $check_user->id)->first();
        
    	$hoadon = new \App\HoaDon;
    	$hoadon->idnv = $req->nhanvien;
    	$hoadon->ngaytao = date('Y-m-d');
    	$hoadon->idkh = $req->khachhang;
    	$hoadon->tongtien = $req->tongtien;
    	$hoadon->giamgia = $req->giamgia;
    	$hoadon->khtra = $req->khachtra;
    	$hoadon->tinhtrang = $req->tinhtrang;
    	$hoadon->idtc = $tochuc->idtc;
    	$hoadon->ghichu = $req->ghichu;
        // print_r($hoadon->toArray());
    	$hoadon->save();

        
        $congno = new \App\CongNoKH;
        $congno->idhd = $hoadon->idhd;
        $congno->sotienthu = $req->khachtra;
        $congno->ngaythu = date('Y-m-d');;
        $congno->idnv = $check_user->id;
        $congno->idtc = $tochuc->idtc;
        $congno->ghichu = $req->ghichu;
        $congno->sotienno = ($req->tongtien - $req->giamgia) - $req->khachtra;
        $congno->save();


    	$data_list = $req->session()->get('data');
    	foreach ($data_list as $key => $value) {
            $update_sanpham = \App\SanPham::where('idsp', $value['id'])->first();
            $update_sanpham->soluongton = $update_sanpham->soluongton - $value['soluong'];
            $update_sanpham->save();
            
    		$chitiethoadon = new \App\ChiTietHoaDon;
    		$chitiethoadon->idhd = $hoadon->idhd;
    		$chitiethoadon->idsp = $value['id'];
    		$chitiethoadon->soluong = $value['soluong'];
            $chitiethoadon->gia = $value['giaban'];
    		$chitiethoadon->trangthai = "1";
			$chitiethoadon->save();    		
    	}
  		return redirect()->back()->with('thongbao', 'them hoa don thanh cong');
    }

    public function xoamotsanphamgiohang(Request $req)
    {
    	$data_list = $req->session()->get('data');
		foreach ($data_list as $key => $value) {
			if($value['id'] == $req->id){
				$a = array_search($key, array_keys($data_list));
				unset($data_list[$a]);
			}	
			$req->session()->put('data', $data_list);
		}
		echo "ok";
    }

    public function suamotsanphamgiohang(Request $req)
    {
    	$data_list = $req->session()->get('data');
		foreach ($data_list as $key => $value) {
			if($value['id'] == $req->id){
				$a = array_search($key, array_keys($data_list));
				$data_list[$a]['soluong'] = $req->qty;
				// unset($data_list[$a]);
			}	
			$req->session()->put('data', $data_list);
		}
		echo "ok";
    }
}
