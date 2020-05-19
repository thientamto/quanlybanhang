<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    //
     protected $table = "NhaCungCap";
     protected $primaryKey = 'idncc';

     public function tochuc()
     {
     	return $this->belongsTo('App\ToChuc','idtc','idtc');
     }

     public function nhapkho()
     {
     	return $this->hasMany('App\NhapKho','idncc','idncc');
     }

     
}
