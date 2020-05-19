<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChiTietNhap;;
use App\NhapKho;
use App\DonViTinh;

class ChiTietNhapController extends Controller
{
    //
	public function getDanhSach()
    {
	    $chitietnhap = ChiTietNhap::all();
	    return view('admin.chitietnhap.danhsach',['chitietnhap' => $chitietnhap]);
	}

	public function getThem()
	{
		$donvitinh = DonViTinh::all();
		$nhapkho = NhapKho::all();
		return view('admin.chitietnhap.them',['donvitinh' => $donvitinh, 'nhapkho' => $nhapkho]);
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
            [
                'soluong' => 'required',
                'gia' => 'required|min:3|max:100',
                'DonViTinh' => 'required',
                'NhapKho' => 'required',
            ],
            [
                'soluong.required' => 'Bạn chưa nhập số lượng', 

                'gia.required' => 'Bạn chưa nhập giá tiền', 
                'gia.min' => 'Giá tiền phải có độ dài từ 3 đến 100 ký tự',

                'DonViTinh.required' => 'Bạn chưa nhập tên đơn vị tính',

                'NhapKho.required' => 'Bạn chưa nhập tên kho',
            ]);

		$chitietnhap = new ChiTietNhap;
		$chitietnhap->idctn = $request->idctn;
		$chitietnhap->soluong = $request->soluong;
		$chitietnhap->gia = $request->gia;
		$chitietnhap->iddvt = $request->DonViTinh;
		$chitietnhap->idnhap = $request->NhapKho;
		$chitietnhap->save();
		return redirect()->back()->with('thongbao','Thêm thành công');
	}

	public function getSua($idctn)
    {
        $chitietnhap = ChiTietNhap::find($idctn);
        $donvitinh = DonViTinh::all();
        $nhapkho = NhapKho::all();
        return view('admin.chitietnhap.sua',['chitietnhap' => $chitietnhap,'donvitinh' => $donvitinh,'nhapkho' => $nhapkho]);
    }

    public function postSua(Request $request, $idctn)
    {
        $chitietnhap = ChiTietNhap::find($idctn);
        $this->validate($request,
            [
                'soluong' => 'required',
                'gia' => 'required|min:3|max:100',
                'DonViTinh' => 'required',
                'NhapKho' => 'required',
            ],
            [
                'soluong.required' => 'Bạn chưa nhập số lượng', 

                'gia.required' => 'Bạn chưa nhập giá tiền', 
                'gia.min' => 'Giá tiền phải có độ dài từ 3 đến 100 ký tự',

                'DonViTinh.required' => 'Bạn chưa nhập tên đơn vị tính',

                'NhapKho.required' => 'Bạn chưa nhập tên kho',
            ]);
        $chitietnhap->idctn = $request->idctn;
		$chitietnhap->soluong = $request->soluong;
		$chitietnhap->gia = $request->gia;
		$chitietnhap->iddvt = $request->DonViTinh;
		$chitietnhap->idnhap = $request->NhapKho;
		$chitietnhap->save();
         return redirect('admin/chitietnhap/sua/'.$idctn)->with('thongbao','Sửa thành công');
    }

    public function getXoa($idctn)
    {
        $chitietnhap = ChiTietNhap::find($idctn);
        $chitietnhap -> delete();
        return redirect('admin/chitietnhap/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
