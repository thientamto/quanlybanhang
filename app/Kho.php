<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kho extends Model
{
    protected $table = "Kho";
    protected $primaryKey = 'idkho';

    public $timestamps = false;
    public $fillable = ['tenkho', 'idtc', 'diachi', 'ghichu'];

    public function tochuc()
    {
        return $this->belongsTo('App\ToChuc', 'idtc', 'idtc');
    }
}
