<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonNCC extends Model
{
    //
    protected $table = "HoaDonNCC";
    protected $primaryKey = 'idhdncc';

    public function tochuc()
     {
     	return $this->belongsTo('App\ToChuc','idtc','idtc');
     }

     public function nhanvien()
     {
     	return $this->belongsTo('App\NhanVien','idnv','idnv');
     }

     public function khachhang()
     {
        return $this->belongsTo('App\KhachHang','idkh','idkh');
     }


     
}
