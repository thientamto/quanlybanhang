<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDonNCC;
use App\NhanVien;
use App\NhaCungCap;
use App\ToChuc;
use App\User;
use Auth, Hash;

class HoaDonNCCController extends Controller
{
    //
    public function getDanhSach()
    {
	    $hoadonncc = HoaDonNCC::all();
        // print_r($hoadonncc->toArray());
	    return view('admin.hoadonncc.danhsach',['hoadonncc' => $hoadonncc]);
	}

	public function getThem()
	{
		$nhanvien = NhanVien::all();
		$nhacungcap = NhaCungCap::all();
		$id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
		return view('admin.hoadonncc.them',['nhanvien' => $nhanvien,'nhacungcap' => $nhacungcap,'tochuc' => $tochuc]);
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
            [
                'NhanVien' => 'required',
                'ngaytao' => 'required',
                'NhaCungCap' => 'required',
                'tongtien' => 'required|min:3|max:100',
                'giamgia' => 'required|min:3|max:100',
                'sotientra' => 'required|min:3|max:100',
                'tinhtrang' => 'required|min:3|max:100',
                'ToChuc' => 'required',
            ],
            [
                'NhanVien.required' => 'Bạn chưa nhập tên nhân viên', 

                'ngaytao.required' => 'Bạn chưa nhập ngày tạo', 

                'NhaCungCap.required' => 'Bạn chưa nhập tên khách hàng', 

                'tongtien.required' => 'Bạn chưa nhập tổng tiền', 
                'tongtien.min' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',
                'tongtien.max' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',

                'giamgia.required' => 'Bạn chưa nhập số tiền giảm', 
                'giamgia.min' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',
                'giamgia.max' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',

                'sotientra.required' => 'Bạn chưa nhập số tiền trả',
                'sotientra.min' => 'Số tiền trả phải có độ dài từ 3 đến 100 ký tự',
                'sotientra.max' => 'Số tiền trả phải có độ dài từ 3 đến 100 ký tự',

                'tinhtrang.required' => 'Bạn chưa nhập tình trạng hóa đơn', 
                'tinhtrang.min' => 'Tình trạng hóa đơn phải có độ dài từ 3 đến 100 ký tự',
                'tinhtrang.max' => 'Tình trạng hóa đơn phải có độ dài từ 3 đến 100 ký tự',

                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 

            ]);

		$hoadonncc = new HoaDonNCC;
		$hoadonncc->idhdncc = $request->idhdncc;
		$hoadonncc->NhanVien = $request->NhanVien;
		$hoadonncc->ngaytao = $request->ngaytao;
		$hoadonncc->idncc = $request->NhaCungCap;
        $hoadonncc->tongtien = $request->tongtien;
		$hoadonncc->giamgia = $request->giamgia;
		$hoadonncc->sotientra = $request->sotientra;
		$hoadonncc->tinhtrang = $request->tinhtrang;
		$hoadonncc->idtc = $request->ToChuc;
		$hoadonncc->ghichu = $request->ghichu;
		$hoadonncc->save();
		return redirect()->back()->with('thongbao','Thêm thành công');
	}

	public function getSua($idhdncc)
    {
        $hoadonncc = HoaDonNCC::find($idhdncc);
        $nhanvien = NhanVien::all();
        $nhacungcap = NhaCungCap::all();
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        return view('admin.hoadonncc.sua',['hoadonncc' => $hoadonncc,'nhanvien' => $nhanvien,'nhacungcap' => $nhacungcap,'tochuc' => $tochuc]);
    }

    public function postSua(Request $request, $idhdncc)
    {
        $hoadonncc = HoaDonNCC::find($idhdncc);
        $this->validate($request,
			[
                'NhanVien' => 'required',
                'ngaytao' => 'required',
                'NhaCungCap' => 'required',
                'tongtien' => 'required|min:3|max:100',
                'giamgia' => 'required|min:3|max:100',
                'sotientra' => 'required|min:3|max:100',
                'tinhtrang' => 'required|min:3|max:100',
                'ToChuc' => 'required',
            ],
            [
                'NhanVien.required' => 'Bạn chưa nhập tên nhân viên', 

                'ngaytao.required' => 'Bạn chưa nhập ngày tạo', 

                'NhaCungCap.required' => 'Bạn chưa nhập tên khách hàng', 

                'tongtien.required' => 'Bạn chưa nhập tổng tiền', 
                'tongtien.min' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',
                'tongtien.max' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',

                'giamgia.required' => 'Bạn chưa nhập số tiền giảm', 
                'giamgia.min' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',
                'giamgia.max' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',

                'sotientra.required' => 'Bạn chưa nhập số tiền trả',
                'sotientra.min' => 'Số tiền trả phải có độ dài từ 3 đến 100 ký tự',
                'sotientra.max' => 'Số tiền trả phải có độ dài từ 3 đến 100 ký tự',

                'tinhtrang.required' => 'Bạn chưa nhập tình trạng hóa đơn', 
                'tinhtrang.min' => 'Tình trạng hóa đơn phải có độ dài từ 3 đến 100 ký tự',
                'tinhtrang.max' => 'Tình trạng hóa đơn phải có độ dài từ 3 đến 100 ký tự',

                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 

            ]);
		$hoadonncc->idhdncc = $request->idhdncc;
		$hoadonncc->NhanVien = $request->NhanVien;
		$hoadonncc->ngaytao = $request->ngaytao;
		$hoadonncc->idncc = $request->NhaCungCap;
        $hoadonncc->tongtien = $request->tongtien;
		$hoadonncc->giamgia = $request->giamgia;
		$hoadonncc->sotientra = $request->sotientra;
		$hoadonncc->tinhtrang = $request->tinhtrang;
		$hoadonncc->idtc = $request->ToChuc;
		$hoadonncc->ghichu = $request->ghichu;
		$hoadonncc->save();
         return redirect('admin/hoadonncc/sua/'.$idhdncc)->with('thongbao','Sửa thành công');
    }

    public function getXoa($idhdncc)
    {
        $hoadonncc = HoaDon::find($idhdncc);
        $hoadonncc -> delete();
        return redirect('admin/hoadonncc/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
