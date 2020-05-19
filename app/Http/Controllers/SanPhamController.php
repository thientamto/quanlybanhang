<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\NhaCungCap;
use App\DonViTinh;
use App\NhomSanPham;
use App\SanPham;

class SanPhamController extends Controller
{
    public function getDanhSach()
    {
        
        $sanpham = SanPham::all();
        return view('admin.sanpham.danhsach', ['sanpham' => $sanpham]);
    }
    public function getThem()
    {
        $nhacungcap = NhaCungCap::all();
        $nhomsanpham = NhomSanPham::all();
        $donvitinh = DonViTinh::all();
        return view('admin.sanpham.them', ['nhacungcap' => $nhacungcap, 'nhomsanpham' => $nhomsanpham, 'donvitinh' => $donvitinh]);
    }
    public function danhsach()
    {
        $danhsach = DB::table('sanpham')->get();
        $quanlydanhsach = view('admin/sanpham/danhsach')->with('danhsach', $danhsach);
        return view('admin.layout.index')->with('admin/sanpham/danhsach', $quanlydanhsach);
        return view('admin.sanpham.danhsach');
    }

    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
                'tensp' => 'required|unique:Kho,tenkho|min:3|max:200',
                'giaban' => 'required',
                'gianhap' => 'required'
            ],
            [
                'tensp.required' => 'Bạn chưa nhập tên kho',
                'tensp.unique' => 'Tên sản phẩm đã tồn tại',
                'tensp.min' => 'Tên sản phẩm phải có độ dài từ 3 đến 200 ký tự',
                'tensp.max' => 'Tên sản phẩm phải có độ dài từ 3 đến 200 ký tự',

                'giaban.required' => 'Bạn chưa nhập giá bán',

                'gianhap.required' => 'Bạn chưa nhập giá nhập'
            ]
        );
        // $array = [
        //     'tensp' => $request->tensp,
        //     'idnsp' => $request->tennsp,
        //     'idncc' => $request->tenncc,
        //     'iddvt' => $request->tendvt,
        //     'giaban' => $request->giaban,
        //     'gianhap' => $request->gianhap,
        //     'hinh' => $request->file('hinh'),
        //     if(hinh){
        //         $new_hinh = rand(0,99).'.'.$
        //     }
        //     'soluongton' => $request->soluongton,
        //     'ghichu' => $request->ghichu,

        // ];

        // $table = SanPham::create($array);
        // return redirect('admin/sanpham/danhsach')->with('thongbao', 'Thêm thành công');

        $sanpham = new SanPham;
        $sanpham->tensp = $request->tensp;
        $sanpham->idnsp = $request->tennsp;
        $sanpham->idncc = $request->tenncc;
        $sanpham->iddvt = $request->tendvt;
        $sanpham->giaban = $request->giaban;
        $sanpham->gianhap = $request->gianhap;
        $file = $request->file('hinh');
        $hinh = time ();
        $hinh_url="upload/sanpham/".$hinh;
        $sanpham->hinh = $hinh_url;
        $file->move("upload/sanpham", "upload/sanpham/" . $hinh);
        $sanpham->soluongton = $request->soluongton;
        $sanpham->ghichu = $request->ghichu;
        $sanpham->save();
        return redirect('admin/sanpham/danhsach')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($idsp)
    {
        $sanpham = SanPham::find($idsp);
        $nhacungcap = NhaCungCap::all();
        $nhomsanpham = NhomSanPham::all();
        $donvitinh = DonViTinh::all();
        return view('admin.sanpham.sua', ['sanpham' => $sanpham, 'nhacungcap' => $nhacungcap, 'nhomsanpham' => $nhomsanpham, 'donvitinh' => $donvitinh]);
    }

    public function postSua(Request $request, $idsp)
    {
        $this->validate(
            $request,
            [
                'tensp' => 'required|unique:Kho,tenkho|min:3|max:200',
                'giaban' => 'required',
                'gianhap' => 'required'
            ],
            [
                'tensp.required' => 'Bạn chưa nhập tên kho',
                'tensp.unique' => 'Tên kho đã tồn tại',
                'tensp.min' => 'Tên kho phải có độ dài từ 3 đến 200 ký tự',
                'tensp.max' => 'Tên kho phải có độ dài từ 3 đến 200 ký tự',

                'giaban.required' => 'Bạn chưa nhập giá bán',

                'gianhap.required' => 'Bạn chưa nhập giá nhập'
            ]
        );

        $sanpham = SanPham::find($idsp);
        $sanpham->tensp = $request->tensp;
        $sanpham->idncc = $request->tenncc;
        $sanpham->idnsp = $request->tennsp;
        $sanpham->iddvt = $request->tendvt;
        $sanpham->giaban = $request->giaban;
        $sanpham->gianhap = $request->gianhap;
        // $sanpham->hinh = $request->hinh;
        $sanpham->soluongton = $request->soluongton;
        $sanpham->ghichu = $request->ghichu;
        $sanpham->save();

        // $array = [
        //     'tenkho' => $request->tenkho,
        //     'diachi' => $request->diachi,
        //     'ghichu' => $request->ghichu,
        // ];
        return redirect('admin/sanpham/danhsach')->with('thongbao', 'Cập nhật thành công');
    }

    public function getXoa($idsp)
    {
        DB::table('sanpham')->where('idsp', $idsp)->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
