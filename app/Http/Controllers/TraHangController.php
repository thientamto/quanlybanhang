<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TraHang;
use App\HoaDon;
use App\NhapKho;
use App\ToChuc;
use App\User;
use Auth, Hash;

class TraHangController extends Controller
{
    //
    public function getDanhSach()
    {
	    $trahang = TraHang::all();
	    return view('admin.trahang.danhsach',['trahang' => $trahang]);
	}

	public function getThem(Request $req)
	{
		$hoadon = HoaDon::orderBy('idhd', 'desc')->get();
		$nhapkho = NhapKho::all();
		$id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        $donvitinh = \App\DonViTinh::get(['iddvt', 'tendvt']);
		return view('admin.trahang.them',['hoadon' => $hoadon,'nhapkho' => $nhapkho,'tochuc' => $tochuc, 'donvitinh'=> $donvitinh]);
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
            [
                'HoaDon' => 'required',
                'tongtien' => 'required|min:3|max:100',
                'giamgia' => 'required|min:3|max:100',
                'phitrahang' => 'required|min:3|max:100',
                'ngaytra' => 'required|min:3|max:100',
                'NhapKho' => 'required',
                'ToChuc' => 'required',
            ],
            [
                'HoaDon.required' => 'Bạn chưa nhập mã hóa đơn', 

                'tongtien.required' => 'Bạn chưa nhập tổng số tiền', 
                'tongtien.min' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',
                'tongtien.max' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',

                'giamgia.required' => 'Bạn chưa nhập số tiền giảm', 
                'giamgia.min' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',
                'giamgia.max' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',

                'phitrahang.required' => 'Bạn chưa nhập phí trả hàng', 
                'phitrahang.min' => 'Phí trả hàng phải có độ dài từ 3 đến 100 ký tự',
                'phitrahang.max' => 'Phí trả hàng phải có độ dài từ 3 đến 100 ký tự',

                'ngaytra.required' => 'Bạn chưa nhập ngày trả hàng', 
                'ngaytra.min' => 'Ngày trả hàng phải có độ dài từ 3 đến 100 ký tự',
                'ngaytra.max' => 'Ngày trả hàng phải có độ dài từ 3 đến 100 ký tự',

                'NhapKho.required' => 'Bạn chưa nhập mã nhập kho',

                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức',
            ]);

		$trahang = new TraHang;
		$trahang->idth = $request->idth;
		$trahang->idhd = $request->HoaDon;
		$trahang->tongtien = $request->tongtien;
		$trahang->giamgia = $request->giamgia;
		$trahang->phitrahang = $request->phitrahang;
        $trahang->ngaytra = $request->ngaytra;
		$trahang->idnhap = $request->NhapKho;
		$trahang->idtc = $request->ToChuc;
		$trahang->save();
		return redirect()->back()->with('thongbao','Thêm thành công');
	}

	public function getSua($idnhap)
    {
        $trahang = TraHang::find($idth);
        $hoadon = HoaDon::all();
        $nhapkho = NhapKho::all();
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        return view('admin.trahang.sua',['trahang' => $trahang,'hoadon' => $hoadon,'nhapkho' => $nhapkho,'tochuc' => $tochuc]);
    }

    public function postSua(Request $request, $idnhap)
    {
        $trahang = TraHang::find($idth);
        $this->validate($request,
            [
                'HoaDon' => 'required',
                'tongtien' => 'required|min:3|max:100',
                'giamgia' => 'required|min:3|max:100',
                'phitrahang' => 'required|min:3|max:100',
                'ngaytra' => 'required|min:3|max:100',
                'NhapKho' => 'required',
                'ToChuc' => 'required',
            ],
            [
                'HoaDon.required' => 'Bạn chưa nhập mã hóa đơn', 

                'tongtien.required' => 'Bạn chưa nhập tổng số tiền', 
                'tongtien.min' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',
                'tongtien.max' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',

                'giamgia.required' => 'Bạn chưa nhập số tiền giảm', 
                'giamgia.min' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',
                'giamgia.max' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',

                'phitrahang.required' => 'Bạn chưa nhập phí trả hàng', 
                'phitrahang.min' => 'Phí trả hàng phải có độ dài từ 3 đến 100 ký tự',
                'phitrahang.max' => 'Phí trả hàng phải có độ dài từ 3 đến 100 ký tự',

                'ngaytra.required' => 'Bạn chưa nhập ngày trả hàng', 
                'ngaytra.min' => 'Ngày trả hàng phải có độ dài từ 3 đến 100 ký tự',
                'ngaytra.max' => 'Ngày trả hàng phải có độ dài từ 3 đến 100 ký tự',

                'NhapKho.required' => 'Bạn chưa nhập mã nhập kho',

                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức',
            ]);
        $trahang->idth = $request->idth;
		$trahang->idhd = $request->HoaDon;
		$trahang->tongtien = $request->tongtien;
		$trahang->giamgia = $request->giamgia;
		$trahang->phitrahang = $request->phitrahang;
        $trahang->ngaytra = $request->ngaytra;
		$trahang->idnhap = $request->NhapKho;
		$trahang->idtc = $request->ToChuc;
		$trahang->save();
         return redirect('admin/trahang/sua/'.$idth)->with('thongbao','Sửa thành công');
    }

    public function getXoa($idth)
    {
        $trahang = TraHang::find($idth);
        $trahang -> delete();
        return redirect('admin/trahang/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }




    public function themsanphamtrahang(Request $req)
    {
        $chitiethoadon = \App\ChiTietHoaDon::where('idcthd', $req->idcthd)->first();
        $sanpham = \App\SanPham::where('idsp', $chitiethoadon->idsp)->first();
        $hoadon = \App\HoaDon::where('idhd', $chitiethoadon->idhd)->first();
        
        $sanpham->soluongton = $sanpham->soluongton + $req->soluong;
        $sanpham->save();

        $trahang = new \App\TraHang;    
        $trahang->idhd = $req->HoaDon;
        $trahang->tongtien = $sanpham->giaban * $req->soluong;
        $trahang->giamgia = '0';
        $trahang->phitrahang = '0';
        $trahang->ngaytra = date('Y-m-d');
        $trahang->idnhap = $sanpham->id_nhap;
        $trahang->idtc = $hoadon->idtc;
        $trahang->save();
        
        // print_r($sanpham->toArray());
        // echo "<br>";
        // print_r($trahang->toArray());
        // 
        $chitiettrahang = new \App\ChiTietTraHang;
        $chitiettrahang->idsp = $sanpham->idsp;
        $chitiettrahang->soluong = $req->soluong;
        $chitiettrahang->iddvt = $req->dvt;
        $chitiettrahang->gia = $sanpham->giaban;
        $chitiettrahang->idth = $trahang->idth;
        $chitiettrahang->save();
        return redirect()->back()->with('thongbao', 'Thêm đơn trả hàng thành công');
    }

    public function chitiettrahang($id)
    {
        $chitiettrahang = \App\ChiTietTraHang::where('idth', $id)->get();
        return view('admin.trahang.chitiettrahang', compact('chitiettrahang'));
    }

}


