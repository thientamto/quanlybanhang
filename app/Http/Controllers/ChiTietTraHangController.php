<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChiTietTraHang;
use App\SanPham;
use App\DonViTinh;
use App\TraHang;

class ChiTietTraHangController extends Controller
{
    //
    public function getDanhSach()
    {
	    $chitiettrahang = ChiTietTraHang::all();
	    return view('admin.chitiettrahang.danhsach',['chitiettrahang' => $chitiettrahang]);
	}

	public function getThem()
	{
		$sanpham = SanPham::all();
		$donvitinh = DonViTinh::all();
		$trahang = TraHang::all();
		return view('admin.chitiettrahang.them',['sanpham' => $sanpham,'donvitinh' => $donvitinh, 'trahang' => $trahang]);
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
            [
                'SanPham' => 'required',
                'soluong' => 'required',
                'DonViTinh' => 'required',
                'gia' => 'required|min:3|max:100',
                'TraHang' => 'required',
            ],
            [
                'SanPham.required' => 'Bạn chưa nhập tên sản phẩm',

                'soluong.required' => 'Bạn chưa nhập số lượng',

                'DonViTinh.required' => 'Bạn chưa nhập tên đơn vị tính', 

                'gia.required' => 'Bạn chưa nhập giá tiền', 
                'gia.min' => 'Giá tiền phải có độ dài từ 3 đến 100 ký tự',
                'gia.max' => 'Giá tiền phải có độ dài từ 3 đến 100 ký tự',

                'TraHang.required' => 'Bạn chưa nhập mã trả hàng',
            ]);

		$chitiettrahang = new ChiTietTraHang;
		$chitiettrahang->idctth = $request->idctth;
		$chitiettrahang->idsp = $request->SanPham;
		$chitiettrahang->soluong = $request->soluong;
		$chitiettrahang->iddvt = $request->DonViTinh;
		$chitiettrahang->gia = $request->gia;
		$chitiettrahang->idth = $request->TraHang;
		$chitiettrahang->save();
		return redirect()->back()->with('thongbao','Thêm thành công');
	}

	public function getSua($idctth)
    {
        $chitiettrahang = ChiTietTraHang::find($idctth);
        $sanpham = SanPham::all();
        $donvitinh = DonViTinh::all();
        $trahang = TraHang::all();
        return view('admin.chitiettrahang.sua',['chitiettrahang' => $chitiettrahang,'sanpham' => $sanpham,'donvitinh' => $donvitinh,'trahang' => $trahang]);
    }

    public function postSua(Request $request, $idctth)
    {
        $chitiettrahang = ChiTietTraHang::find($idctth);
        $this->validate($request,
        	[
                'SanPham' => 'required',
                'soluong' => 'required',
                'DonViTinh' => 'required',
                'gia' => 'required|min:3|max:100',
                'TraHang' => 'required',
            ],
            [
                'SanPham.required' => 'Bạn chưa nhập tên sản phẩm',

                'soluong.required' => 'Bạn chưa nhập số lượng',

                'DonViTinh.required' => 'Bạn chưa nhập tên đơn vị tính', 

                'gia.required' => 'Bạn chưa nhập giá tiền', 
                'gia.min' => 'Giá tiền phải có độ dài từ 3 đến 100 ký tự',
                'gia.max' => 'Giá tiền phải có độ dài từ 3 đến 100 ký tự',

                'TraHang.required' => 'Bạn chưa nhập mã trả hàng',
            ]);
        $chitiettrahang->idctth = $request->idctth;
		$chitiettrahang->idsp = $request->SanPham;
		$chitiettrahang->soluong = $request->soluong;
		$chitiettrahang->iddvt = $request->DonViTinh;
		$chitiettrahang->gia = $request->gia;
		$chitiettrahang->idth = $request->TraHang;
		$chitiettrahang->save();
         return redirect('admin/chitiettrahang/sua/'.$idctth)->with('thongbao','Sửa thành công');
    }

    public function getXoa($idctth)
    {
        $chitiettrahang = ChiTietTraHang::find($idctth);
        $chitiettrahang -> delete();
        return redirect('admin/chitiettrahang/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
