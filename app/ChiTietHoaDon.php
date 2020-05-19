<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    //
     protected $table = "ChiTietHoaDon";
     protected $primaryKey = 'idctn';

     public function donvitinh()
     {
     	return $this->belongsTo('App\DonViTinh','iddvt','iddvt');
     }

     public function hoadon()
     {
     	return $this->hasMany('App\HoaDon','idhd','idhd');
     }
}
