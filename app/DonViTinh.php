<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonViTinh extends Model
{
    //
     protected $table = "DonViTinh";
     protected $primaryKey = 'iddvt';

     public function chitietnhap()
     {
     	return $this->hasMany('App\ChiTietNhap','iddvt','iddvt');
     }

     public function tochuc()
     {
     	return $this->belongsTo('App\ToChuc','idtc','idtc');
     }
}
