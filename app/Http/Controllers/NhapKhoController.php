<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhapKho;
use App\NhaCungCap;
use App\ToChuc;
use App\ChiTietNhap;
use App\User;
use Auth, Hash;
use DB;
class NhapKhoController extends Controller
{
    //
    public function getDanhSach()
    {
        $id = Auth::id();
      $check_user = User::find($id);
      $tochuc = ToChuc::where('id_user', $check_user->id)->first();
      //return $tochuc->idtc;
      $nhapkho = NhapKho::where('idtc', $tochuc->idtc)->get();
	    return view('admin.nhapkho.danhsach',['nhapkho' => $nhapkho]);
	}

	public function getThem()
	{
		 
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
            [
                'ToChuc' => 'required',
                'tonggia' => 'required|min:3|max:100',
                'giamgia' => 'required|min:3|max:100',
                'NhaCungCap' => 'required',
                'ngaynhap' => 'required',
                'tientrancc' => 'required|min:3|max:100'
            ],
            [
                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 

                'tonggia.required' => 'Bạn chưa nhập tổng số tiền nhập kho', 
                'tonggia.min' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',

                'giamgia.required' => 'Bạn chưa nhập số tiền giảm', 
                'giamgia.min' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',

                'NhaCungCap.required' => 'Bạn chưa nhập tên nhà cung cấp',

                'ngaynhap.required' => 'Bạn chưa nhập ngày nhập kho',

                'tientrancc.required' => 'Bạn chưa nhập số tiền trả nhà cung cấp', 
                'tientrancc.min' => 'Số tiền trả nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',
            ]);

		$nhapkho = new NhapKho;
		$nhapkho->idtc = $request->ToChuc;
		$nhapkho->tonggia = $request->tonggia;
		$nhapkho->giamgia = $request->giamgia;
		$nhapkho->idncc = $request->NhaCungCap;
        $nhapkho->ngaynhap = $request->ngaynhap;
		$nhapkho->tientrancc = $request->tientrancc;
		$nhapkho->ghichu = $request->ghichu;
		$nhapkho->save();
		return redirect()->back()->with('thongbao','Thêm thành công');
	}

	public function getSua($idnhap)
    {
        $nhapkho = NhapKho::find($idnhap);
        $nhacungcap = NhaCungCap::all();
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        return view('admin.nhapkho.sua',['nhapkho' => $nhapkho,'nhacungcap' => $nhacungcap,'tochuc' => $tochuc]);
    }

    public function postSua(Request $request, $idnhap)
    {
        $nhapkho = NhapKho::find($idnhap);
        $this->validate($request,
            [
                'ToChuc' => 'required',
                'tonggia' => 'required|min:3|max:100',
                'giamgia' => 'required|min:3|max:100',
                'NhaCungCap' => 'required',
                'tientrancc' => 'required|min:3|max:100'
            ],
            [
                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 

                'tonggia.required' => 'Bạn chưa nhập tổng số tiền nhập kho', 
                'tonggia.min' => 'Tổng số tiền có độ dài từ 3 đến 100 ký tự',

                'giamgia.required' => 'Bạn chưa nhập số tiền giảm', 
                'giamgia.min' => 'Số tiền giảm phải có độ dài từ 3 đến 100 ký tự',

                'NhaCungCap.required' => 'Bạn chưa nhập tên nhà cung cấp',

                'ngaynhap.required' => 'Bạn chưa nhập ngày nhập kho',

                'tientrancc.required' => 'Bạn chưa nhập số tiền trả nhà cung cấp', 
                'tientrancc.min' => 'Số tiền trả nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',
            ]);
        $nhapkho->idtc = $request->ToChuc;
        $nhapkho->tonggia = $request->tonggia;
        $nhapkho->giamgia = $request->giamgia;
        $nhapkho->tientrancc = $request->tientrancc;
        $nhapkho->ngaynhap = $request->ngaynhap;
        $nhapkho->idncc = $request->NhaCungCap;
        $nhapkho->ghichu = $request->ghichu;
        $nhapkho->save();
         return redirect('admin/nhapkho/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getXoa($idnhap)
    {
        $chitietnhap = ChiTietNhap::where('idnhap', $idnhap)->get();
        if($chitietnhap)
        {
            foreach ($chitietnhap as $key => $value) {
                $value->delete();
            }
        }
        $sanpham = \App\SanPham::where('id_nhap', $idnhap)->get();
        if($sanpham)
        {
            
            foreach ($sanpham as $key => $value) {
                $chitiethoadon = \App\ChiTietHoaDon::where('idsp', $value['idsp'])->first();
                if($chitiethoadon != '')
                {
                    return redirect('admin/nhapkho/danhsach')->with('thongbao','Khong cho phep xoa');
                }
                $value->delete();
            }
        }

        $nhapkho = NhapKho::find($idnhap);
        $nhapkho->delete();
        return redirect('admin/nhapkho/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }

    public function nhapkho(Request $req)
    {
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        $nhacungcap = NhaCungCap::get();
        $loaisp = \App\NhomSanPham::get();
        $donvitinh = \App\DonViTinh::get();
        $data_list = $req->session()->get('data_sanpham');

        return view('admin.nhapkho.them', compact('nhacungcap', 'loaisp', 'data_list', 'tochuc', 'donvitinh'));
    }

    public function postnhapkho(Request $req)
    {
        $data_list = $req->session()->get('data_sanpham');
        if ($data_list==null){
            $data_list=array();
        }

        $data = array(
            'id' => time(),
            'id_ncc' => $req->nhacc,
            'id_loaisp' => $req->loaisp,
            'tensanpham' => $req->tensp,
            'dvt' => $req->dvt,
            'gianhap' => $req->gianhap,
            'giaban' => $req->giaban,
            'soluong' => $req->soluongton,
        );
        array_push($data_list, $data);
        $req->session()->put('data_sanpham', $data_list);
        return redirect()->back()->with('thongbao', 'Lưu phiếu thành công');
    }

    public function luuphieunhapkho(Request $req)
    {
        $nhapkho = new \App\NhapKho;
        $nhapkho->idtc = $req->idtc;
        $nhapkho->tonggia = $req->tonggia;
        $nhapkho->giamgia = $req->giamgia;
        $nhapkho->tientrancc = $req->tientrancc;
        $nhapkho->ngaynhap = $req->ngaynhap;
        $nhapkho->ghichu = $req->ghichu;
        $nhapkho->tinhtrang = $req->tinhtrang;
        $nhapkho->idncc = $req->idncc;
        $nhapkho->save();

        $id = Auth::id();
        $check_user = User::find($id);

        $hoadonncc = new \App\HoaDonNCC;
        $hoadonncc->idnv = $check_user->id;
        $hoadonncc->ngaytao = $req->ngaynhap;
        $hoadonncc->idncc = $req->idncc;
        $hoadonncc->tongtien = $req->tonggia;
        $hoadonncc->giamgia = $req->giamgia;
        $hoadonncc->sotientra = $req->tientrancc;
        $hoadonncc->tinhtrang = $req->tinhtrang;
        $hoadonncc->idtc = $req->idtc;
        $hoadonncc->idnhap = $nhapkho->idnhap;
        $hoadonncc->ghichu = $req->ghichu;
        $hoadonncc->save();
        // print_r($hoadonncc->toArray());





        $congnoncc = new \App\CongNoNCC;
        $congnoncc->idncc = $req->idncc;
        $congnoncc->idtc =  $req->idtc;
        $congnoncc->sotienthu = $req->tonggia - $req->giamgia;
        $congnoncc->sotienno = $req->tientrancc - ($req->tonggia - $req->giamgia);
        $congnoncc->ngaytra = $req->ngaynhap;
        $congnoncc->ghichu = $req->ghichu;
        $congnoncc->save();
        // print_r($congnoncc->toArray());




        $data_list = $req->session()->get('data_sanpham');
        
        foreach ($data_list as $key => $value) {

            $check_sp = \App\SanPham::where('tensp', $value['tensanpham'])->first();
            if($check_sp)
            {
                $sanpham = new \App\SanPham;
                $sanpham->id_nhap = $nhapkho->idnhap;
                $sanpham->tensp = $value['tensanpham'];
                $sanpham->idnsp = $value['id_loaisp'];
                $sanpham->iddvt = $value['dvt'];
                $sanpham->giaban = $value['giaban'];
                $sanpham->gianhap = $value['gianhap'];
                $sanpham->idncc = $req->idncc;
                $sanpham->soluongton = $check_sp->soluongton + $value['soluong'];
                $sanpham->idtc = $req->idtc;
                $sanpham->save();

                $chitietnhap = new \App\ChiTietNhap;
                $chitietnhap->idsp = $sanpham->idsp;
                $chitietnhap->soluong = $value['soluong'];
                $chitietnhap->gia = $value['giaban'];
                $chitietnhap->iddvt = $value['dvt'];
                $chitietnhap->idnhap = $nhapkho->idnhap;
                $chitietnhap->save();
            }
            else
            {
                $sanpham = new \App\SanPham;
                $sanpham->id_nhap = $nhapkho->idnhap;
                $sanpham->tensp = $value['tensanpham'];
                $sanpham->idnsp = $value['id_loaisp'];
                $sanpham->iddvt = $value['dvt'];
                $sanpham->giaban = $value['giaban'];
                $sanpham->gianhap = $value['gianhap'];
                $sanpham->idncc = $req->idncc;
                $sanpham->soluongton = $value['soluong'];
                $sanpham->idtc = $req->idtc;
                $sanpham->save();

                $chitietnhap = new \App\ChiTietNhap;
                $chitietnhap->idsp = $sanpham->idsp;
                $chitietnhap->soluong = $value['soluong'];
                $chitietnhap->gia = $value['giaban'];
                $chitietnhap->iddvt = $value['dvt'];
                $chitietnhap->idnhap = $nhapkho->idnhap;
                $chitietnhap->save();

            }
            
        }
        return redirect()->back()->with('thongbao', 'Nhập kho thành công');

        // print_r($nhapkho->toArray());
        // $req->session()->forget('data_sanpham');
    }

    public function xoaallcartnhapkho(Request $req)
    {
        $req->session()->forget('data_sanpham');
        return redirect()->back();
    }

    public function xoaonecartnhapkho(Request $req, $id)
    {
        $data_list = $req->session()->get('data_sanpham');
        foreach ($data_list as $key => $value) {
            if($value['id'] == $req->id){
                $a = array_search($key, array_keys($data_list));
                unset($data_list[$a]);
            }   
            $req->session()->put('data_sanpham', $data_list);
        }
        return redirect()->back();
    }

    public function suaonecartnhapkho(Request $req)
    {
        $data_list = $req->session()->get('data_sanpham');
        foreach ($data_list as $key => $value) {
            if($value['id'] == $req->id){
                $a = array_search($key, array_keys($data_list));
                $data_list[$a]['soluong'] = $req->qty;
                // unset($data_list[$a]);
            }   
            $req->session()->put('data_sanpham', $data_list);
        }
        echo "ok";
    }

    public function chitietnhap($id)
    {
        $chitietnhap = \App\ChiTietNhap::where('idnhap', $id)->get();
        return view('admin.nhapkho.chitietnhap', compact('chitietnhap'));
    }
}
        


        

