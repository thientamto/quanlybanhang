<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\ToChuc;
use App\NhomSanPham;

session_start();

class NhomSanPhamController extends Controller
{
    public function getDanhMuc()
    {
        $nhomsanpham = NhomSanPham::all();
        return view('admin.nhomsanpham.alldanhmuc');
    }
    public function themdanhmuc()
    {
        $tochuc = ToChuc::all();
        return view('admin.nhomsanpham.themdanhmuc', ['tochuc' => $tochuc]);
    }
    public function alldanhmuc()
    {
        $alldanhmuc = DB::table('nhomsanpham')->get();
        $quanlyalldanhmuc = view('admin/nhomsanpham/alldanhmuc')->with('alldanhmuc', $alldanhmuc);
        return view('admin.layout.index')->with('admin/nhomsanpham/alldanhmuc', $quanlyalldanhmuc);
        return view('admin.nhomsanpham.alldanhmuc');
    }

    public function luudanhmuc(Request $request)
    {
        $this->validate(
            $request,
            [
                'tennsp' => 'required|unique:NhomSanPham,tennsp|min:3|max:200',
                'ToChuc' => 'required'
            ],
            [
                'tennsp.required' => 'Bạn chưa nhập tên danh mục',
                'tennsp.unique' => 'Tên danh mục đã tồn tại',
                'tennsp.min' => 'Tên danh mục phải có độ dài từ 3 đến 200 ký tự',
                'tennsp.max' => 'Tên danh mục phải có độ dài từ 3 đến 200 ký tự',

                'ToChuc.required' => 'Bạn chưa chọn tổ chức'
            ]
        );
        $array =[
            'tennsp'=>$request->tennsp,
            'idtc'=>$request->ToChuc,
            'ghichu'=>$request->ghichu,
        ];
        
        $table = NhomSanPham::create($array);
        return redirect('admin/nhomsanpham/alldanhmuc')->with('thongbao', 'Thêm thành công');
    }

    public function suadanhmuc($idnsp)
    {
        $suadanhmuc = DB::table('nhomsanpham')->where('idnsp', $idnsp)->get();
        $quanlysuadanhmuc = view('admin/nhomsanpham/suadanhmuc')->with('suadanhmuc', $suadanhmuc);
        return view('admin.layout.index')->with('admin.nhomsanpham.alldanhmuc', $quanlysuadanhmuc);
        return view('admin.nhomsanpham.alldanhmuc');
    }

    public function capnhatdanhmuc(Request $request, $idnsp)
    {
        $this->validate(
            $request,
            [
                'tennsp' => 'required'
            ],
            [
                'tennsp.required' => 'Bạn chưa nhập tên danh mục'
            ]
        );

        $nhomsanpham = NhomSanPham::find($idnsp);
        $nhomsanpham->tennsp = $request->tennsp;
        $nhomsanpham->ghichu = $request->ghichu;
        $nhomsanpham->save();
        return redirect('admin/nhomsanpham/alldanhmuc')->with('thongbao', 'Cập nhật thành công');
    }
    public function xoadanhmuc($idnsp)
    {
        DB::table('nhomsanpham')->where('idnsp', $idnsp)->delete();
        return redirect('admin/nhomsanpham/alldanhmuc')->with('thongbao', 'Xóa thành công');
    }
}
