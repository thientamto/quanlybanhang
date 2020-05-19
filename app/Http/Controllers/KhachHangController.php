<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHang;
use App\ToChuc;
use App\User;
use Auth, Hash;


class KhachHangController extends Controller
{
    public function getDanhSach()
    {
        $khachhang = KhachHang::all();
        return view('admin/khachhang/danhsach', ['khachhang' => $khachhang]);
    }

    public function getThem()
    {
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        $user = User::all();
        return view('admin.khachhang.them', ['tochuc' => $tochuc, 'user' => $user]);
    }

    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
                'tenkh' => 'required|min:1|max:100',
                'ngaysinh' => 'required',
                'sdt' => 'required|min:10|max:10',
                'gioitinh' => 'required',
                'email' => 'required'
            ],
            [
                'tenkh.required' => 'Bạn chưa nhập tên khách hàng',
                'tenkh.min' => 'Tên khách hàng không hợp lệ',
                'tenkh.max' => 'Tên khách hàng không hợp lệ',

                'ngaysinh.required' => 'Bạn chưa nhập ngày sinh',

                'sdt.required' => 'Bạn chưa nhập số điện thoại',
                'sdt.min' => 'Số điện thoại phải có độ dài từ 3 đến 100 ký tự',
                'sdt.max' => 'Số điện thoại phải có độ dài từ 3 đến 100 ký tự',

                'gioitinh.required' => 'Bạn chưa nhập giới tính',

                'email.required' => 'Bạn chưa nhập email'

            ]
        );

        $khachhang = new KhachHang;
        $khachhang->tenkh = $request->tenkh;
        $khachhang->ngaysinh = $request->ngaysinh;
        $khachhang->diachi = $request->diachi;
        $khachhang->sdt = $request->sdt;
        $khachhang->gioitinh = $request->gioitinh;
        $khachhang->email = $request->email;
        $khachhang->idtc = $request->ToChuc;
        $khachhang->save();
        return redirect('admin/khachhang/danhsach')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($idkh)
    {
        $khachhang = KhachHang::find($idkh);
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        $user = User::all();
        return view('admin.khachhang.sua', ['khachhang' => $khachhang, 'tochuc' => $tochuc, 'user' => $user]);
    }

    public function postSua(Request $request, $idkh)
    {
        $khachhang = KhachHang::find($idkh);
        $this->validate(
            $request,
            [
                'tenkh' => 'required|min:3|max:100',
                'ngaysinh' => 'required',
                'sdt' => 'required|min:9|max:10',
                'gioitinh' => 'required',
                'email' => 'required'
            ],
            [
                'tenkh.required' => 'Bạn chưa nhập tên nhân viên',
                'tenkh.min' => 'Tên nhân viên phải có độ dài từ 3 đến 100 ký tự',
                'tenkh.max' => 'Tên nhân viên phải có độ dài từ 3 đến 100 ký tự',

                'ngaysinh.required' => 'Bạn chưa nhập ngày sinh',

                'sdt.required' => 'Bạn chưa nhập số điện thoại',
                'sdt.min' => 'Độ dài số điện thoại không hợp lệ',
                'sdt.max' => 'Độ dài số điện thoại không hợp lệ',

                'gioitinh.required' => 'Bạn chưa nhập giới tính',

                'email.required' => 'Bạn chưa nhập email'

            ]
        );
        $khachhang->tenkh = $request->tenkh;
        $khachhang->ngaysinh = $request->ngaysinh;
        $khachhang->diachi = $request->diachi;
        $khachhang->sdt = $request->sdt;
        $khachhang->gioitinh = $request->gioitinh;
        $khachhang->email = $request->email;
        $khachhang->idtc = $request->ToChuc;
        $khachhang->save();
        return redirect('admin/khachhang/danhsach')->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($idkh)
    {
        $khachhang = KhachHang::find($idkh);
        $khachhang->delete();
        return redirect('admin/khachhang/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
