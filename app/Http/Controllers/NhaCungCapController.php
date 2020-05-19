<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToChuc;
use App\NhaCungCap;
use App\NhapKho;
use App\User;
use Auth, Hash;

class NhaCungCapController extends Controller
{
    //
    public function getDanhSach()
    {
	    $nhacungcap = NhaCungCap::all();
	    return view('admin.nhacungcap.danhsach',['nhacungcap' => $nhacungcap]);
	}

	public function getThem()
	{
		$id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
		return view('admin.nhacungcap.them',['tochuc' => $tochuc]);
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
            [
                'tenncc' => 'required|unique:NhaCungCap,tenncc|min:3|max:100',
                'diachi' => 'required|min:3|max:100',
                'sdt' => 'required',
                'email' => 'required|email|unique:NhaCungCap,email|min:3|max:100',
                'ToChuc' => 'required',
            ],
            [

                'tenncc.required' => 'Bạn chưa nhập tên nhà cung cấp', 
                'tenncc.unique' => 'Tên nhà cung cấp đã tồn tại', 
                'tenncc.min' => 'Tên nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',
                'tenncc.max' => 'Tên nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',


                'diachi.required' => 'Bạn chưa nhập địa chỉ nhà cung cấp',
                'diachi.min' => 'Địa chỉ nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',
                'diachi.max' => 'Địa chỉ nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',

                'sdt.required' => 'Bạn chưa nhập số điện thoại nhà cung cấp',

                'email.required' => 'Bạn chưa nhập email nhà cung cấp',
                'email.unique' => 'Email nhà cung cấp đã tồn tại',
                'email.min' => 'Email nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',
                'email.max' => 'Email nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',
                'email.email' => 'Bạn chưa nhập đúng định dạng email',

                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 
            ]);

		$nhacungcap = new NhaCungCap;
		$nhacungcap->tenncc = $request->tenncc;
		$nhacungcap->diachi = $request->diachi;
		$nhacungcap->sdt = $request->sdt;
		$nhacungcap->email = $request->email;
		$nhacungcap->idtc = $request->ToChuc;
		$nhacungcap->ghichu = $request->ghichu;
		$nhacungcap->save();
		return redirect('admin/nhacungcap/danhsach')->back()->with('thongbao','Thêm thành công');
	}

	public function getSua($idncc)
    {
        $nhacungcap = NhaCungCap::find($idncc);
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        return view('admin.nhacungcap.sua',['nhacungcap' => $nhacungcap, 'tochuc' => $tochuc]);
    }

    public function postSua(Request $request, $idncc)
    {
        $nhacungcap = NhaCungCap::find($idncc);
        $this->validate($request,
            [
                'tenncc' => 'required|min:3|max:100',
                'diachi' => 'required|min:3|max:100',
                'sdt' => 'required',
                'email' => 'required|email|min:3|max:100',
                'ToChuc' => 'required',
            ],
            [

                'tenncc.required' => 'Bạn chưa nhập tên nhà cung cấp', 
                'tenncc.min' => 'Tên nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',
                'tenncc.max' => 'Tên nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',


                'diachi.required' => 'Bạn chưa nhập địa chỉ nhà cung cấp',
                'diachi.min' => 'Địa chỉ nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',
                'diachi.max' => 'Địa chỉ nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',

                'sdt.required' => 'Bạn chưa nhập số điện thoại nhà cung cấp',

                'email.required' => 'Bạn chưa nhập email nhà cung cấp',
                'email.min' => 'Email nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',
                'email.max' => 'Email nhà cung cấp phải có độ dài từ 3 đến 100 ký tự',
                'email.email' => 'Bạn chưa nhập đúng định dạng email',

                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 
            ]);
        $nhacungcap->tenncc = $request->tenncc;
        $nhacungcap->diachi = $request->diachi;
        $nhacungcap->sdt = $request->sdt;
        $nhacungcap->email = $request->email;
        $nhacungcap->idtc = $request->ToChuc;
        $nhacungcap->ghichu = $request->ghichu;
        $nhacungcap->save();
         return redirect('admin/nhacungcap/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getXoa($idncc)
    {
        $nhacungcap = NhaCungCap::find($idncc);
        $nhacungcap -> delete();
        return redirect('admin/nhacungcap/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
    
}
