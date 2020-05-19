<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonViTinh;
use App\ToChuc;
use App\User;
use Auth, Hash;

class DonViTinhController extends Controller
{
    //
    public function getDanhSach()
    {
	    $donvitinh = DonViTinh::all();
	    return view('admin.donvitinh.danhsach',['donvitinh' => $donvitinh]);
	}

	public function getThem()
	{
		$id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
		return view('admin.donvitinh.them',['tochuc' => $tochuc]);
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
            [
                'tendvt' => 'required|min:2|max:100',
                'ToChuc' => 'required',
            ],
            [

                'tendvt.required' => 'Bạn chưa nhập tên đon vị tính', 
                'tendvt.min' => 'Tên đơn vị tính phải có độ dài từ 2 đến 100 ký tự',
                'tendvt.max' => 'Tên đơn vị tính phải có độ dài từ 2 đến 100 ký tự',

                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 
            ]);

		$donvitinh = new DonViTinh;
		$donvitinh->iddvt = $request->iddvt;
		$donvitinh->tendvt = $request->tendvt;
		$donvitinh->idtc = $request->ToChuc;
		$donvitinh->save();
		return redirect()->back()->with('thongbao','Thêm thành công');
	}

	public function getSua($iddvt)
    {
        $donvitinh = DonViTinh::find($iddvt);
        $id = Auth::id();
        $check_user = User::find($id);
        $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        return view('admin.donvitinh.sua',['donvitinh' => $donvitinh,'tochuc' => $tochuc]);
    }

    public function postSua(Request $request, $iddvt)
    {
        $donvitinh = DonViTinh::find($iddvt);
        $this->validate($request,
			[
                'tendvt' => 'required|min:2|max:100',
                'ToChuc' => 'required',
            ],
            [

                'tendvt.required' => 'Bạn chưa nhập tên đon vị tính', 
                'tendvt.min' => 'Tên đơn vị tính phải có độ dài từ 2 đến 100 ký tự',
                'tendvt.max' => 'Tên đơn vị tính phải có độ dài từ 2 đến 100 ký tự',

                'ToChuc.required' => 'Bạn chưa nhập tên tổ chức', 
            ]);
        $donvitinh->iddvt = $request->iddvt;
		$donvitinh->tendvt = $request->tendvt;
		$donvitinh->idtc = $request->ToChuc;
		$donvitinh->save();
         return redirect('admin/donvitinh/sua/'.$iddvt)->with('thongbao','Sửa thành công');
    }

    public function getXoa($iddvt)
    {
        $donvitinh = DonViTinh::find($iddvt);
        $donvitinh -> delete();
        return redirect('admin/donvitinh/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }

}
