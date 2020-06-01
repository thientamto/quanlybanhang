<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CongNoKH;
use App\HoaDon;
use App\NhanVien;
use App\ToChuc;
use App\User;
use Auth, Hash;
use DB;


class CongNoKHController extends Controller
{
    ////
    public function getDanhSach()
    {
        $id = Auth::id();
      $check_user = User::find($id);
      $tochuc = ToChuc::where('id_user', $check_user->id)->first();
      //return $tochuc->idtc;
      $congnokh = CongNoKH::where('idtc', $tochuc->idtc)->get();
        return view('admin.congnokh.danhsach',['congnokh' => $congnokh]);
    }
    // cong no ncc
    public function getDanhSachNCC()
    {
        $id = Auth::id();
      $check_user = User::find($id);
      $tochuc = ToChuc::where('id_user', $check_user->id)->first();
      //return $tochuc->idtc;
      $congnoncc = \App\CongNoNCC::where('idtc', $tochuc->idtc)->get();
        // return $congnoncc;
	    return view('admin.congnoncc.danhsach',['congnoncc' => $congnoncc]);
	}

	public function getThem()
	{
		$hoadon = HoaDon::all();
		$nhanvien = NhanVien::all();
		$id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
		return view('admin.congnokh.them',['hoadon' => $hoadon,'nhanvien' => $nhanvien,'tochuc' => $tochuc]);
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
            [
                'HoaDon' => 'required',
                'sotienthu' => 'required|min:2|max:100',
                'ngaythu' => 'required|min:2|max:100',
                'NhanVien' => 'required',
                'ToChuc' => 'required',
            ],
            [

                'HoaDon.required' => 'Bạn chưa nhập id hóa đơn', 

                'sotienthu.required' => 'Bạn chưa nhập số tiền thu', 
                'sotienthu.min' => 'Số tiền thu phải có độ dài từ 2 đến 100 ký tự',
                'sotienthu.max' => 'Số tiền thu phải có độ dài từ 2 đến 100 ký tự',

                'ngaythu.required' => 'Bạn chưa nhập ngày thu', 
                'ngaythu.min' => 'Ngày thu phải có độ dài từ 2 đến 100 ký tự',
                'ngaythu.max' => 'Ngày thu phải có độ dài từ 2 đến 100 ký tự',

                'NhanVien.required' => 'Bạn chưa nhập tên nhân viên', 

                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 
            ]);

		$congnokh = new CongNoKH;
		$congnokh->idcnkh = $request->idcnkh;
		$congnokh->idhd = $request->HoaDon;
		$congnokh->sotienthu = $request->ngaythu;
		$congnokh->idnv = $request->NhanVien;
		$congnokh->idtc = $request->ToChuc;
		$congnokh->save();
		return redirect()->back()->with('thongbao','Thêm thành công');
	}

	public function getSua($idcnkh)
    {
        $congnokh = CongNoKH::find($idcnkh);
        $hoadon = HoaDon::all();
        $nhanvien = NhanVien::all();
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        return view('admin.congnokh.sua',['donvitinh' => $donvitinh,'hoadon' => $hoadon,'nhanvien' => $nhanvien,'tochuc' => $tochuc]);
    }

    public function postSua(Request $request, $idcnkh)
    {
        $congnokh = CongNoKH::find($idcnkh);
        $this->validate($request,
			[
                'HoaDon' => 'required',
                'sotienthu' => 'required|min:2|max:100',
                'ngaythu' => 'required|min:2|max:100',
                'NhanVien' => 'required',
                'ToChuc' => 'required',
            ],
            [

                'HoaDon.required' => 'Bạn chưa nhập id hóa đơn', 

                'sotienthu.required' => 'Bạn chưa nhập số tiền thu', 
                'sotienthu.min' => 'Số tiền thu phải có độ dài từ 2 đến 100 ký tự',
                'sotienthu.max' => 'Số tiền thu phải có độ dài từ 2 đến 100 ký tự',

                'ngaythu.required' => 'Bạn chưa nhập ngày thu', 
                'ngaythu.min' => 'Ngày thu phải có độ dài từ 2 đến 100 ký tự',
                'ngaythu.max' => 'Ngày thu phải có độ dài từ 2 đến 100 ký tự',

                'NhanVien.required' => 'Bạn chưa nhập tên nhân viên', 

                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 
            ]);
        $congnokh->idcnkh = $request->idcnkh;
		$congnokh->idhd = $request->HoaDon;
		$congnokh->sotienthu = $request->ngaythu;
		$congnokh->idnv = $request->NhanVien;
		$congnokh->idtc = $request->ToChuc;
		$congnokh->save();
         return redirect('admin/congnokh/sua/'.$idcnkh)->with('thongbao','Sửa thành công');
    }

    public function getXoa($idcnkh)
    {
        $congnokh = CongNoKH::find($idcnkh);
        $congnokh -> delete();
        return redirect('admin/congnokh/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }

}
