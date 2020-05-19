<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomSanPham extends Model
{
    protected $table = "nhomsanpham";
    protected $primaryKey = 'idnsp';
    public $timestamps = false;
    public $fillable = ['tennsp', 'idtc', 'ghichu'];
    public function tochuc()
    {
        return $this->belongsTo('App\ToChuc','idtc','idtc');
    }

    public function sanpham()
    {
        return $this->hasMany('App\SanPham','idnsp','idnsp');
    }
}
