<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;
use App\ToChuc;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller
{
    public function getDanhSach()
    {
        $nhanvien = NhanVien::all();
        return view('admin/nhanvien/danhsach', ['nhanvien' => $nhanvien]);
    }

    public function getThem()
    {
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        $user = User::all();
        return view('admin.nhanvien.them', ['tochuc' => $tochuc, 'user' => $user]);
    }

    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
                'tennv' => 'required|unique:NhanVien,tennv|min:1|max:100',
                'ngaysinh' => 'required',
                'sdt' => 'required|unique:NhanVien,sdt|min:9|max:10',
                'gioitinh' => 'required',
                'email' => 'required'
            ],
            [
                'tennv.required' => 'Bạn chưa nhập tên nhân viên',
                'tennv.unique' => 'Tên nhân viên đã tồn tại',
                'tennv.min' => 'Tên nhân viên không hợp lệ',
                'tennv.max' => 'Tên nhân viên không hợp lệ',

                'ngaysinh.required' => 'Bạn chưa nhập ngày sinh',

                'sdt.required' => 'Bạn chưa nhập số điện thoại',
                'sdt.unique' => 'Số điện thoại đã tồn tại',
                'sdt.min' => 'Số điện thoại không hợp lệ',
                'sdt.max' => 'Số điện thoại không hợp lệ',

                'gioitinh.required' => 'Bạn chưa nhập giới tính',

                'email.required' => 'Bạn chưa nhập email'

            ]
        );

        $user = new User;
        $user->sdt = $request->sdt;
        $user->name = $request->tennv;
        $user->email = $request->email;
        $user->role = "0";
        $user->password = Hash::make($request->password);
        $user->save();

        $nhanvien = new NhanVien;
        $nhanvien->tennv = $request->tennv;
        $nhanvien->ngaysinh = $request->ngaysinh;
        $nhanvien->diachi = $request->diachi;
        $nhanvien->sdt = $request->sdt;
        $nhanvien->gioitinh = $request->gioitinh;
        $nhanvien->email = $request->email;
        $nhanvien->idtc = $request->ToChuc;
        $nhanvien->iduser = $user->id;
        $nhanvien->save();
        return redirect('admin/nhanvien/danhsach')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($idnv)
    {
        $nhanvien = NhanVien::find($idnv);
        $tochuc = ToChuc::all();
        $user = User::all();
        return view('admin.nhanvien.sua', ['nhanvien' => $nhanvien, 'tochuc' => $tochuc, 'user' => $user]);
    }

    public function postSua(Request $request, $idnv)
    {
        $nhanvien = NhanVien::find($idnv);
        $this->validate(
            $request,
            [
                'tennv' => 'required|min:3|max:100',
                'ngaysinh' => 'required',
                'sdt' => 'required|min:9|max:10',
                'gioitinh' => 'required',
                'email' => 'required'
            ],
            [
                'tennv.required' => 'Bạn chưa nhập tên nhân viên',
                'tennv.min' => 'Tên nhân viên phải có độ dài từ 3 đến 100 ký tự',
                'tennv.max' => 'Tên nhân viên phải có độ dài từ 3 đến 100 ký tự',

                'ngaysinh.required' => 'Bạn chưa nhập ngày sinh',

                'sdt.required' => 'Bạn chưa nhập số điện thoại',
                'sdt.min' => 'Độ dài số điện thoại không hợp lệ',
                'sdt.max' => 'Độ dài số điện thoại không hợp lệ',

                'gioitinh.required' => 'Bạn chưa nhập giới tính',

                'email.required' => 'Bạn chưa nhập email'

            ]
        );
        $nhanvien->tennv = $request->tennv;
        $nhanvien->ngaysinh = $request->ngaysinh;
        $nhanvien->diachi = $request->diachi;
        $nhanvien->sdt = $request->sdt;
        $nhanvien->gioitinh = $request->gioitinh;
        $nhanvien->email = $request->email;
        $nhanvien->idtc = $request->ToChuc;
        $nhanvien->save();
        return redirect('admin/nhanvien/danhsach')->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($idnv)
    {
        $nhanvien = NhanVien::find($idnv);
        $nhanvien->delete();
        return redirect('admin/nhanvien/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
