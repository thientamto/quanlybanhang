<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonNCC extends Model
{
    //
    protected $table = "ChiTietHoaDonNCC";
    protected $primaryKey = 'idctnncc';

    public function donvitinh()
     {
     	return $this->belongsTo('App\DonViTinh','iddvt','iddvt');
     }

    public function hoadonncc()
     {
     	return $this->hasMany('App\HoaDonNCC','idhdncc','idhdncc');
     }

     
}
