<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
class UserController extends Controller
{
//     public function getDanhSach()
//     {
// 	    $user = User::all();
// 	    return view('admin.user.danhsach',['user' => $user]);
// 	}

// 	public function getThem()
// 	{
// 		return view('admin.user.them');
// 	}

// 	public function postThem(Request $request)
// 	{
// 		$this->validate($request,
//             [
//                 'name' => 'required|unique:ToChuc,tentc|min:3|max:100',
//                 'email' => 'required|min:3|max:100',
//                 'password' => 'required|min:3|max:100',
//                 'sdt' => 'required|min:3|max:100'
//             ],
//             [
//                 'tentc.required' => 'Bạn chưa nhập tên tổ chức', 
//                 'tentc.unique' => 'Tên tổ chức đã tồn tại',
//                 'tentc.min' => 'Tên tổ chức phải có độ dài từ 3 đến 100 ký tự',
//                 'tentc.max' =>  'Tên tổ chức phải có độ dài từ 3 đến 100 ký tự',

//                 'hoten.required' => 'Bạn chưa nhập tên người quản lý', 
//                 'hoten.min' => 'Tên quản lý phải có độ dài từ 3 đến 100 ký tự',
//                 'hoten.max' =>  'Tên quản lý phải có độ dài từ 3 đến 100 ký tự',

//                 'diachi.required' => 'Bạn chưa nhập địa chỉ', 
//                 'diachi.min' => 'Địa chỉ phải có độ dài từ 3 đến 100 ký tự',
//                 'diachi.max' =>  'Địa chỉ phải có độ dài từ 3 đến 100 ký tự',

//                 'sdt.required' => 'Bạn chưa nhập số điện thoại', 
//                 'sdt.min' => 'Số điện thoại phải có độ dài từ 3 đến 100 ký tự',
//                 'sdt.max' =>  'Số điện thoại phải có độ dài từ 3 đến 100 ký tự',
//             ]);

// 		$user = new Users;
// 		$user->tentc = $request->tentc;
// 		$user->hoten = $request->hoten;
// 		$user->diachi = $request->diachi;
// 		$user->sdt = $request->sdt;
// 		$user->ghichu = $request->ghichu;
// 		$user->save();
// 		return redirect('admin/user/danhsach')->with('thongbao','Thêm thành công');
// 	}

//     public function getSua($idtc)
//     {
//         $user = Users::find($idtc);
//         return view('admin.user.sua',['user' => $user]);
//     }

//     public function postSua(Request $request, $idtc)
//     {
//         $user = Users::find($idtc);
//         $this->validate($request,
//             [
//                 'tentc' => 'required|min:3|max:100',
//                 'hoten' => 'required|min:3|max:100',
//                 'diachi' => 'required|min:3|max:100',
//                 'sdt' => 'required|min:3|max:100'
//             ],
//             [
//                 'tentc.required' => 'Bạn chưa nhập tên tổ chức', 
//                 'tentc.min' => 'Tên tổ chức phải có độ dài từ 3 đến 100 ký tự',
//                 'tentc.max' =>  'Tên tổ chức phải có độ dài từ 3 đến 100 ký tự',

//                 'hoten.required' => 'Bạn chưa nhập tên người quản lý', 
//                 'hoten.min' => 'Tên quản lý phải có độ dài từ 3 đến 100 ký tự',
//                 'hoten.max' =>  'Tên quản lý phải có độ dài từ 3 đến 100 ký tự',

//                 'diachi.required' => 'Bạn chưa nhập địa chỉ', 
//                 'diachi.min' => 'Địa chỉ phải có độ dài từ 3 đến 100 ký tự',
//                 'diachi.max' =>  'Địa chỉ phải có độ dài từ 3 đến 100 ký tự',

//                 'sdt.required' => 'Bạn chưa nhập số điện thoại', 
//                 'sdt.min' => 'Số điện thoại phải có độ dài từ 3 đến 100 ký tự',
//                 'sdt.max' =>  'Số điện thoại phải có độ dài từ 3 đến 100 ký tự',
//             ]);
//         $user->tentc = $request->tentc;
//         $user->hoten = $request->hoten;
//         $user->diachi = $request->diachi;
//         $user->sdt = $request->sdt;
//         $user->ghichu = $request->ghichu;
//         $user->save();
//          return redirect('admin/user/danhsach/'.$idtc)->with('thongbao','Sửa thành công');
//     }

//     public function getXoa($idtc)
//     {
//         $user = User::find($idtc);
//         $user -> delete();
//         return redirect('admin/user/danhsach')->with('thongbao','Bạn đã xóa thành công');
//     }
 }
