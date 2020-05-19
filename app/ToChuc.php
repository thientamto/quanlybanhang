<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToChuc extends Model
{
    //
     protected $table = "ToChuc";
     protected $primaryKey = 'idtc';

     public function nhapkho()
     {
     	return $this->hasMany('App\NhapKho','idtc','idtc');
     }
}
