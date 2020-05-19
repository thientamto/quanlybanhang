<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    //
     protected $table = "HoaDon";
     protected $primaryKey = 'idhd';

     public function tochuc()
     {
     	return $this->belongsTo('App\ToChuc','idtc','idtc');
     }

     public function nhacungcap()
     {
     	return $this->belongsTo('App\NhaCungCap','idncc','idncc');
     }

     public function nhanvien()
     {
     	return $this->belongsTo('App\NhanVien','idnv','idnv');
     }

}
