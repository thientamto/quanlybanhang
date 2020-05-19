<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChiTietHoaDonNCC;
use App\DonViTinh;
use App\HoaDonNCC;

class ChiTietHoaDonNCCController extends Controller
{
    //
    public function getDanhSach()
    {
	    $chitiethoadonncc = ChiTietHoaDonNCC::all();
	    return view('admin.chitiethoadonncc.danhsach',['chitiethoadonncc' => $chitiethoadonncc]);
	}

	public function getThem()
	{
		$donvitinh = DonViTinh::all();
		$hoadonncc = HoaDonNCC::all();
		return view('admin.chitiethoadonncc.them',['donvitinh' => $donvitinh, 'hoadonncc' => $hoadonncc]);
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
            [
                'soluong' => 'required',
                'gia' => 'required|min:3|max:100',
                'DonViTinh' => 'required',
                'HoaDonNCC' => 'required',
            ],
            [
                'soluong.required' => 'Bạn chưa nhập số lượng', 

                'gia.required' => 'Bạn chưa nhập giá tiền', 
                'gia.min' => 'Giá tiền phải có độ dài từ 3 đến 100 ký tự',

                'DonViTinh.required' => 'Bạn chưa nhập tên đơn vị tính',

                'HoaDonNCC.required' => 'Bạn chưa nhập tên kho',
            ]);

		$chitiethoadonncc = new ChiTietHoaDonNCC;
		$chitiethoadonncc->idcthdncc = $request->idcthdncc;
		$chitiethoadonncc->soluong = $request->soluong;
		$chitiethoadonncc->gia = $request->gia;
		$chitiethoadonncc->iddvt = $request->DonViTinh;
		$chitiethoadonncc->idhdncc = $request->HoaDonNCC;
		$chitiethoadonncc->save();
		return redirect()->back()->with('thongbao','Thêm thành công');
	}

	public function getSua($idcthdncc)
    {
        $chitiethoadonncc = ChiTietHoaDonNCC::find($idcthdncc);
        $donvitinh = DonViTinh::all();
        $hoadonncc = HoaDonNCC::all();
        return view('admin.chitiethoadonncc.sua',['chitiethoadonncc' => $chitiethoadonncc,'donvitinh' => $donvitinh,'hoadonncc' => $hoadonncc]);
    }

    public function postSua(Request $request, $idcthdncc)
    {
        $chitiethoadonncc = ChiTietHoaDonNCC::find($idcthdncc);
        $this->validate($request,
            [
                'soluong' => 'required',
                'gia' => 'required|min:3|max:100',
                'DonViTinh' => 'required',
                'HoaDonNCC' => 'required',
            ],
            [
                'soluong.required' => 'Bạn chưa nhập số lượng', 

                'gia.required' => 'Bạn chưa nhập giá tiền', 
                'gia.min' => 'Giá tiền phải có độ dài từ 3 đến 100 ký tự',

                'DonViTinh.required' => 'Bạn chưa nhập tên đơn vị tính',

                'HoaDonNCC.required' => 'Bạn chưa nhập tên kho',
            ]);
		$chitiethoadonncc->idcthdncc = $request->idcthdncc;
		$chitiethoadonncc->soluong = $request->soluong;
		$chitiethoadonncc->gia = $request->gia;
		$chitiethoadonncc->iddvt = $request->DonViTinh;
		$chitiethoadonncc->idhdncc = $request->HoaDonNCC;
		$chitiethoadonncc->save();
         return redirect('admin/chitiethoadonncc/sua/'.$idcthdncc)->with('thongbao','Sửa thành công');
    }

    public function getXoa($idcthdncc)
    {
        $chitiethoadonncc = ChiTietHoaDonNCC::find($idcthdncc);
        $chitiethoadonncc -> delete();
        return redirect('admin/chitiethoadonncc/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
