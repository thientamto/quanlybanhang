<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChiTietHoaDon;
use App\DonViTinh;
use App\HoaDon;

class ChiTietHoaDonController extends Controller
{
    //
    public function getDanhSach()
    {
       $chitiethoadon = ChiTietHoaDon::all();
       return view('admin.chitiethoadon.danhsach',['chitiethoadon' => $chitiethoadon]);
   }

   public function getThem()
   {
      $donvitinh = DonViTinh::all();
      $hoadon = HoaDon::all();
      return view('admin.chitiethoadon.them',['donvitinh' => $donvitinh, 'hoadon' => $hoadon]);
  }

  public function postThem(Request $request)
  {
      $this->validate($request,
        [
            'soluong' => 'required',
            'gia' => 'required|min:3|max:100',
            'DonViTinh' => 'required',
            'HoaDon' => 'required',
        ],
        [
            'soluong.required' => 'Bạn chưa nhập số lượng', 

            'gia.required' => 'Bạn chưa nhập giá tiền', 
            'gia.min' => 'Giá tiền phải có độ dài từ 3 đến 100 ký tự',

            'DonViTinh.required' => 'Bạn chưa nhập tên đơn vị tính',

            'HoaDon.required' => 'Bạn chưa nhập tên kho',
        ]);

      $chitiethoadon = new ChiTietHoaDon;
      $chitiethoadon->idcthd = $request->idcthd;
      $chitiethoadon->soluong = $request->soluong;
      $chitiethoadon->gia = $request->gia;
      $chitiethoadon->iddvt = $request->DonViTinh;
      $chitiethoadon->idhd = $request->HoaDon;
      $chitiethoadon->save();
      return redirect()->back()->with('thongbao','Thêm thành công');
  }

  public function getSua($idcthd)
  {
    $chitiethoadon = ChiTietHoaDon::find($idcthd);
    $donvitinh = DonViTinh::all();
    $hoadon = HoaDon::all();
    return view('admin.chitiethoadon.sua',['chitiethoadon' => $chitiethoadon,'donvitinh' => $donvitinh,'hoadon' => $hoadon]);
}

public function postSua(Request $request, $idcthd)
{
    $chitiethoadon = ChiTietHoaDon::find($idcthd);
    $this->validate($request,
        [
            'soluong' => 'required',
            'gia' => 'required|min:3|max:100',
            'DonViTinh' => 'required',
            'HoaDon' => 'required',
        ],
        [
            'soluong.required' => 'Bạn chưa nhập số lượng', 

            'gia.required' => 'Bạn chưa nhập giá tiền', 
            'gia.min' => 'Giá tiền phải có độ dài từ 3 đến 100 ký tự',

            'DonViTinh.required' => 'Bạn chưa nhập tên đơn vị tính',

            'HoaDon.required' => 'Bạn chưa nhập tên kho',
        ]);
    $chitiethoadon->idcthd = $request->idcthd;
    $chitiethoadon->soluong = $request->soluong;
    $chitiethoadon->gia = $request->gia;
    $chitiethoadon->iddvt = $request->DonViTinh;
    $chitiethoadon->idcthd = $request->HoaDon;
    $chitiethoadon->save();
    return redirect('admin/chitiethoadon/sua/'.$idcthd)->with('thongbao','Sửa thành công');
}

public function getXoa($idcthd)
{
    $chitiethoadon = ChiTietHoaDon::find($idcthd);
    $chitiethoadon -> delete();
    return redirect('admin/chitiethoadon/danhsach')->with('thongbao','Bạn đã xóa thành công');
}
}
