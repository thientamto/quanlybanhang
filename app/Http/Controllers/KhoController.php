<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ToChuc;
use App\Kho;
use App\User;
use Auth, Hash;

class KhoController extends Controller
{
    public function getDanhSach()
    {
        $id = Auth::id();
      $check_user = User::find($id);
      $tochuc = ToChuc::where('id_user', $check_user->id)->first();
      //return $tochuc->idtc;
      $kho = Kho::where('idtc', $tochuc->idtc)->get();
        // DB::table('tochuc')->select('tentc')->get();
        return view('admin.kho.danhsach', ['kho' => $kho]);
    }
    public function getThem()
    {
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        return view('admin.kho.them', ['tochuc' => $tochuc]);
    }
    public function danhsach()
    {
        $danhsach = DB::table('kho')->get();
        $quanlydanhsach = view('admin/kho/danhsach')->with('danhsach', $danhsach);
        return view('admin.layout.index')->with('admin/kho/danhsach', $quanlydanhsach);
        return view('admin.kho.danhsach');
    }

    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
                'tenkho' => 'required|unique:Kho,tenkho|min:3|max:200',
                'ToChuc' => 'required',
                'diachi' => 'required'
            ],
            [
                'tennsp.required' => 'Bạn chưa nhập tên kho',
                'tennsp.unique' => 'Tên kho đã tồn tại',
                'tennsp.min' => 'Tên kho phải có độ dài từ 3 đến 200 ký tự',
                'tennsp.max' => 'Tên kho phải có độ dài từ 3 đến 200 ký tự',

                'ToChuc.required' => 'Bạn chưa chọn kho',

                'diachi.required' => 'Bạn chưa nhập địa chỉ kho'
            ]
        );
        $array = [
            'tenkho' => $request->tenkho,
            'idtc' => $request->ToChuc,
            'diachi' => $request->diachi,
            'ghichu' => $request->ghichu,
        ];

        $table = Kho::create($array);
        return redirect('admin/kho/danhsach')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($idkho)
    {
        $kho = Kho::find($idkho);
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        return view('admin.kho.sua', ['kho' => $kho]);
    }

    public function postSua(Request $request, $idkho)
    {
        $this->validate(
            $request,
            [
                'tenkho' => 'min:3|max:200',
                'ToChuc' => 'min:3|max:200'
            ],
            [
                'tenkho.min' => 'Tên kho phải có độ dài từ 3 đến 200 ký tự',
                'tenkho.max' => 'Tên kho phải có độ dài từ 3 đến 200 ký tự',

                'ToChuc.min' => 'Tên kho phải có độ dài từ 3 đến 200 ký tự',
                'ToChuc.max' => 'Tên kho phải có độ dài từ 3 đến 200 ký tự',
            ]
        );

        $kho = Kho::find($idkho);
        $kho->tenkho = $request->tenkho;
        $kho->idtc = $request->ToChuc;
        $kho->diachi = $request->diachi;
        $kho->ghichu = $request->ghichu;
        $kho->save();
        return redirect('admin/kho/danhsach')->with('thongbao', 'Cập nhật thành công');
    }

    public function getXoa($idkho)
    {
        DB::table('kho')->where('idkho', $idkho)->delete();
        return redirect('admin/kho/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
