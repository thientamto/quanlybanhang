<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = "SanPham";
    protected $primaryKey = 'idsp';

    public $timestamps = false;
    public $fillable = ['tensp', 'idnsp', 'iddvt', 'giaban', 'gianhap', 'hinh', 'idncc', 'soluongton', 'ghichu'];
    public function nhomsanpham()
    {
        return $this->belongsTo('App\NhomSanPham', 'idnsp', 'idnsp');
    }

    public function donvitinh()
    {
        return $this->belongsTo('App\DonViTinh', 'iddvt', 'iddvt');
    }

    public function nhacungcap()
    {
        return $this->belongsTo('App\NhaCungCap', 'idncc', 'idncc');
    }

    public function tochuc()
     {
        return $this->belongsTo('App\ToChuc','idtc','idtc');
     }
}
