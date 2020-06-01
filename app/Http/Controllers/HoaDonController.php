<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDon;
use App\ToChuc;
use App\NhanVien;
use App\KhachHang;
use App\User;
use Auth, Hash;

class HoaDonController extends Controller
{
    //

    public function getDanhSach()
    {
      $id = Auth::id();
      $check_user = User::find($id);
      $tochuc = ToChuc::where('id_user', $check_user->id)->first();
      //return $tochuc->idtc;
      $hoadon = HoaDon::where('idtc', $tochuc->idtc)->get();
      return view('admin.hoadon.danhsach',['hoadon' => $hoadon]);
   }

   public function getThem()
   {
      $nhanvien = NhanVien::all();
      $khachhang = KhachHang::all();
      $id = Auth::id();
      $check_user = User::find($id);
      $tochuc = ToChuc::where('id_user', $check_user->id)->first();
      return view('admin.hoadon.them',['nhanvien' => $nhanvien,'khachhang' => $khachhang,'tochuc' => $tochuc]);
  }

  public function postThem(Request $request)
  {
      $this->validate($request,
        [
            'NhanVien' => 'required',
            'ngaytao' => 'required',
            'KhachHang' => 'required',
            'tongtien' => 'required|min:3|max:100',
            'giamgia' => 'required|min:3|max:100',
            'khtra' => 'required|min:3|max:100',
            'tinhtrang' => 'required|min:3|max:100',
            'ToChuc' => 'required',
        ],
        [
            'NhanVien.required' => 'Bạn chưa nhập tên nhân viên', 

            'ngaytao.required' => 'Bạn chưa nhập ngày tạo', 

            'KhachHang.required' => 'Bạn chưa nhập tên khách hàng', 

            'tongtien.required' => 'Bạn chưa nhập tổng tiền', 
            'tongtien.min' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',
            'tongtien.max' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',

            'giamgia.required' => 'Bạn chưa nhập số tiền giảm', 
            'giamgia.min' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',
            'giamgia.max' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',

            'khtra.required' => 'Bạn chưa nhập số tiền khách hàng trả',
            'khtra.min' => 'Số tiền khách trả phải có độ dài từ 3 đến 100 ký tự',
            'khtra.max' => 'Số tiền khách trả phải có độ dài từ 3 đến 100 ký tự',

            'tinhtrang.required' => 'Bạn chưa nhập tình trạng hóa đơn', 
            'tinhtrang.min' => 'Tình trạng hóa đơn phải có độ dài từ 3 đến 100 ký tự',
            'tinhtrang.max' => 'Tình trạng hóa đơn phải có độ dài từ 3 đến 100 ký tự',

            'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 

        ]);

      $hoadon = new HoaDon;
      $hoadon->idhd = $request->idhd;
      $hoadon->NhanVien = $request->NhanVien;
      $hoadon->ngaytao = $request->ngaytao;
      $hoadon->idkh = $request->KhachHang;
      $hoadon->tongtien = $request->tongtien;
      $hoadon->giamgia = $request->giamgia;
      $hoadon->khtra = $request->khtra;
      $hoadon->tinhtrang = $request->tinhtrang;
      $hoadon->idtc = $request->ToChuc;
      $hoadon->ghichu = $request->ghichu;
      $hoadon->save();
      return redirect()->back()->with('thongbao','Thêm thành công');
  }

  public function getSua($idhd)
  {
    $hoadon = HoaDon::find($idhd);
    $nhanvien = NhanVien::all();
    $khachhang = KhachHang::all();
    $id = Auth::id();
    $check_user = User::find($id);
    $tochuc = ToChuc::where('id_user', $check_user->id)->first();
    return view('admin.hoadon.sua',['hoadon' => $hoadon,'nhanvien' => $nhanvien,'khachhang' => $khachhang,'tochuc' => $tochuc]);
}

public function postSua(Request $request, $idhd)
{
    $hoadon = HoaDon::find($idhd);
    $this->validate($request,
     [
        'NhanVien' => 'required',
        'ngaytao' => 'required',
        'KhachHang' => 'required',
        'tongtien' => 'required|min:3|max:100',
        'giamgia' => 'required|min:3|max:100',
        'khtra' => 'required|min:3|max:100',
        'tinhtrang' => 'required|min:3|max:100',
        'ToChuc' => 'required',
    ],
    [
        'NhanVien.required' => 'Bạn chưa nhập tên nhân viên', 

        'ngaytao.required' => 'Bạn chưa nhập ngày tạo', 

        'KhachHang.required' => 'Bạn chưa nhập tên khách hàng', 

        'tongtien.required' => 'Bạn chưa nhập tổng tiền', 
        'tongtien.min' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',
        'tongtien.max' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',

        'giamgia.required' => 'Bạn chưa nhập số tiền giảm', 
        'giamgia.min' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',
        'giamgia.max' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',

        'khtra.required' => 'Bạn chưa nhập số tiền khách hàng trả',
        'khtra.min' => 'Số tiền khách trả phải có độ dài từ 3 đến 100 ký tự',
        'khtra.max' => 'Số tiền khách trả phải có độ dài từ 3 đến 100 ký tự',

        'tinhtrang.required' => 'Bạn chưa nhập tình trạng hóa đơn', 
        'tinhtrang.min' => 'Tình trạng hóa đơn phải có độ dài từ 3 đến 100 ký tự',
        'tinhtrang.max' => 'Tình trạng hóa đơn phải có độ dài từ 3 đến 100 ký tự',

        'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 

    ]);
    $hoadon->idhd = $request->idhd;
    $hoadon->NhanVien = $request->NhanVien;
    $hoadon->ngaytao = $request->ngaytao;
    $hoadon->KhachHang = $request->KhachHang;
    $hoadon->tongtien = $request->tongtien;
    $hoadon->giamgia = $request->giamgia;
    $hoadon->khtra = $request->khtra;
    $hoadon->tinhtrang = $request->tinhtrang;
    $hoadon->ToChuc = $request->ToChuc;
    $hoadon->ghichu = $request->ghichu;
    $hoadon->save();
    return redirect('admin/hoadon/sua/'.$idhd)->with('thongbao','Sửa thành công');
}

public function getXoa($idhd)
{
    $hoadon = HoaDon::find($idhd);
    $hoadon -> delete();
    return redirect('admin/hoadon/danhsach')->with('thongbao','Bạn đã xóa thành công');
}
public function chitiethoadon($id)
{
    $chitiethoadon = \App\ChiTietHoaDon::where('idhd', $id)->get();
    return view('admin.hoadon.chitiethoadon', compact('chitiethoadon'));
}

}
