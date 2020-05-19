<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToChuc;
use App\NhapKho;
use App\NhaCungCap;
class ToChucController extends Controller
{
    //
    public function getDanhSach()
    {
	    $tochuc = ToChuc::all();
	    return view('admin.tochuc.danhsach',['tochuc' => $tochuc]);
	}

	public function getThem()
	{
		return view('admin.tochuc.them');
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
            [
                'tentc' => 'required|unique:ToChuc,tentc|min:3|max:100',
                'hoten' => 'required|min:3|max:100',
                'diachi' => 'required|min:3|max:100',
                'sdt' => 'required|min:3|max:100'
            ],
            [
                'tentc.required' => 'Bạn chưa nhập tên tổ chức', 
                'tentc.unique' => 'Tên tổ chức đã tồn tại',
                'tentc.min' => 'Tên tổ chức phải có độ dài từ 3 đến 100 ký tự',
                'tentc.max' =>  'Tên tổ chức phải có độ dài từ 3 đến 100 ký tự',

                'hoten.required' => 'Bạn chưa nhập tên người quản lý', 
                'hoten.min' => 'Tên quản lý phải có độ dài từ 3 đến 100 ký tự',
                'hoten.max' =>  'Tên quản lý phải có độ dài từ 3 đến 100 ký tự',

                'diachi.required' => 'Bạn chưa nhập địa chỉ', 
                'diachi.min' => 'Địa chỉ phải có độ dài từ 3 đến 100 ký tự',
                'diachi.max' =>  'Địa chỉ phải có độ dài từ 3 đến 100 ký tự',

                'sdt.required' => 'Bạn chưa nhập số điện thoại', 
                'sdt.min' => 'Số điện thoại phải có độ dài từ 3 đến 100 ký tự',
                'sdt.max' =>  'Số điện thoại phải có độ dài từ 3 đến 100 ký tự',
            ]);

		$tochuc = new ToChuc;
		$tochuc->tentc = $request->tentc;
		$tochuc->hoten = $request->hoten;
		$tochuc->diachi = $request->diachi;
		$tochuc->sdt = $request->sdt;
		$tochuc->ghichu = $request->ghichu;
		$tochuc->save();
		return redirect('admin/tochuc/them')->with('thongbao','Thêm thành công');
	}

    public function getSua($idtc)
    {
        $tochuc = ToChuc::find($idtc);
        return view('admin.tochuc.sua',['tochuc' => $tochuc]);
    }

    public function postSua(Request $request, $idtc)
    {
        $tochuc = ToChuc::find($idtc);
        $this->validate($request,
            [
                'tentc' => 'required|min:3|max:100',
                'hoten' => 'required|min:3|max:100',
                'diachi' => 'required|min:3|max:100',
                'sdt' => 'required|min:3|max:100'
            ],
            [
                'tentc.required' => 'Bạn chưa nhập tên tổ chức', 
                'tentc.min' => 'Tên tổ chức phải có độ dài từ 3 đến 100 ký tự',
                'tentc.max' =>  'Tên tổ chức phải có độ dài từ 3 đến 100 ký tự',

                'hoten.required' => 'Bạn chưa nhập tên người quản lý', 
                'hoten.min' => 'Tên quản lý phải có độ dài từ 3 đến 100 ký tự',
                'hoten.max' =>  'Tên quản lý phải có độ dài từ 3 đến 100 ký tự',

                'diachi.required' => 'Bạn chưa nhập địa chỉ', 
                'diachi.min' => 'Địa chỉ phải có độ dài từ 3 đến 100 ký tự',
                'diachi.max' =>  'Địa chỉ phải có độ dài từ 3 đến 100 ký tự',

                'sdt.required' => 'Bạn chưa nhập số điện thoại', 
                'sdt.min' => 'Số điện thoại phải có độ dài từ 3 đến 100 ký tự',
                'sdt.max' =>  'Số điện thoại phải có độ dài từ 3 đến 100 ký tự',
            ]);
        $tochuc->tentc = $request->tentc;
        $tochuc->hoten = $request->hoten;
        $tochuc->diachi = $request->diachi;
        $tochuc->sdt = $request->sdt;
        $tochuc->ghichu = $request->ghichu;
        $tochuc->save();
         return redirect('admin/tochuc/sua/'.$idtc)->with('thongbao','Sửa thành công');
    }

    public function getXoa($idtc)
    {
        $tochuc = ToChuc::find($idtc);
        $tochuc -> delete();
        return redirect('admin/tochuc/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}   
