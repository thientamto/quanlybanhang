<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
     protected $table = "KhachHang";
    protected $primaryKey = 'idkh';

    public $timestamps = false;
    public $fillable = ['tenkh', 'idtc', 'idtk', 'ngaysinh', 'diachi', 'sdt', 'gioitinh', 'email', 'ghichu'];
    public function users()
    {
        return $this->belongsTo('App\Users', 'idtk', 'idtk');
    }

    public function tochuc()
    {
        return $this->belongsTo('App\ToChuc', 'idtc', 'idtc');
    }
}
