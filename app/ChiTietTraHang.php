<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietTraHang extends Model
{
    //
     protected $table = "ChiTietTraHang";
     protected $primaryKey = 'idctth';

     public function donvitinh()
     {
     	return $this->belongsTo('App\DonViTinh','iddvt','iddvt');
     }

     public function sanpham()
     {
     	return $this->belongsTo('App\SanPham','idsp','idsp');
     }

     public function trahang()
     {
     	return $this->belongsTo('App\TraHang','idth','idth');
     }
}
