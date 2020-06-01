<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToChuc;
use App\NhomSanPham;
use App\User;
use Auth, Hash;

class NhomSanPhamController extends Controller
{
    public function getDanhSach()
    {
        $id = Auth::id();
      $check_user = User::find($id);
      $tochuc = ToChuc::where('id_user', $check_user->id)->first();
      //return $tochuc->idtc;
      $nhomsanpham = NhomSanPham::where('idtc', $tochuc->idtc)->get();
        return view('admin/nhomsanpham/danhsach', ['nhomsanpham' => $nhomsanpham]);
    }

    public function getThem()
    {
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        $user = User::all();
        return view('admin.nhomsanpham.them', ['tochuc' => $tochuc, 'user' => $user]);
    }

    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
                'tennsp' => 'required|unique:NhanVien,tennv|min:1|max:100',
                'ToChuc' => 'required'
            ],
            [
                'tennsp.required' => 'Bạn chưa nhập tên nhóm sản phẩm',
                'tennsp.unique' => 'Tên nhóm sản phẩm đã tồn tại',
                'tennsp.min' => 'Tên nhóm sản phẩm phải dài hơn 1 ký tự',
                'tennv.max' => 'Tên nhóm sản phẩm phải ngắn hơn 100 ký tự',

                'ToChuc.required' => 'Bạn chưa nhập ngày sinh',
            ]
        );

        $nhomsanpham = new NhomSanPham;
        $nhomsanpham->tennsp = $request->tennsp;
        $nhomsanpham->idtc = $request->ToChuc;
        $nhomsanpham->ghichu = $request->ghichu;
        $nhomsanpham->save();
        return redirect('admin/nhomsanpham/danhsach')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($idnsp)
    {
        $nhomsanpham = NhomSanPham::find($idnsp);
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        $user = User::all();
        return view('admin.nhomsanpham.sua', ['nhomsanpham' => $nhomsanpham, 'tochuc' => $tochuc, 'user' => $user]);
    }

    public function postSua(Request $request, $idnsp)
    {
    	$nhomsanpham = NhomSanPham::find($idnsp);
        $this->validate(
            $request,
            [
                'tennsp' => 'required|unique:NhanVien,tennv|min:1|max:100',
                'ToChuc' => 'required'
            ],
            [
                'tennsp.required' => 'Bạn chưa nhập tên nhóm sản phẩm',
                'tennsp.unique' => 'Tên nhóm sản phẩm đã tồn tại',
                'tennsp.min' => 'Tên nhóm sản phẩm phải dài hơn 1 ký tự',
                'tennv.max' => 'Tên nhóm sản phẩm phải ngắn hơn 100 ký tự',

                'ToChuc.required' => 'Bạn chưa nhập ngày sinh',
            ]
        );

        $nhomsanpham->tennsp = $request->tennsp;
        $nhomsanpham->idtc = $request->ToChuc;
        $nhomsanpham->ghichu = $request->ghichu;
        $nhomsanpham->save();
        return redirect('admin/nhomsanpham/danhsach')->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($idnsp)
    {
        $nhomsanpham = NhomSanPham::find($idnsp);
        $nhomsanpham->delete();
        return redirect('admin/nhomsanpham/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
