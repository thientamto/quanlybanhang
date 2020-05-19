<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietNhap extends Model
{
    //
     protected $table = "ChiTietNhap";
     protected $primaryKey = 'idctn';

     public function donvitinh()
     {
     	return $this->belongsTo('App\DonViTinh','iddvt','iddvt');
     }

     public function nhapkho()
     {
     	return $this->hasMany('App\NhapKho','idnhap','idnhap');
     }
}
