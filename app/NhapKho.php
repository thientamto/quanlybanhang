<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhapKho extends Model
{
    //
     protected $table = "NhapKho";
     protected $primaryKey = 'idnhap';

     public function tochuc()
     {
     	return $this->belongsTo('App\ToChuc','idtc','idtc');
     }

     public function nhacungcap()
     {
     	return $this->belongsTo('App\NhaCungCap','idncc','idncc');
     }
}
