<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = "NhanVien";
    protected $primaryKey = 'idnv';
    public $timestamps = false;
    public $fillable = ['tennv', 'idtc', 'idtk', 'ngaysinh', 'diachi', 'sdt', 'gioitinh', 'email', 'ghichu'];
    public function users()
    {
        return $this->hasMany('App\Users', 'idtk', 'idtk');
    }

    public function tochuc()
    {
        return $this->belongsTo('App\ToChuc', 'idtc', 'idtc');
    }

}
