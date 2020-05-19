<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class BanHangController extends Controller
{
    public function banhang(Request $req)
    {
    	$khachhang = \App\khachhang::get(['idkh', 'tenkh']);
    	$nhanvien = \App\nhanvien::get(['idnv', 'tennv']);
    	$sanpham = \App\SanPham::get();
    	$cart = $req->session()->get('data');
    	$i = 1;
    	return view('admin.banhang.banhang', compact('khachhang', 'sanpham', 'cart', 'i', 'nhanvien'));
    }
}
