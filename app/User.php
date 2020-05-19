<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    protected $primaryKey = 'id';

    public $timestamps = false;
    //public $fillable = ['tensp', 'idnsp', 'iddvt', 'giaban', 'gianhap', 'hinh', 'idncc', 'soluongton', 'ghichu'];
    public function nhanvien()
    {
        return $this->hasMany('App\User', 'idtk', 'idtk');
    }

    // public function donvitinh()
    // {
    //     return $this->hasMany('App\DonViTinh', 'iddvt', 'iddvt');
    // }

    // public function nhacungcap()
    // {
    //     return $this->hasMany('App\NhaCungCap', 'idncc', 'idncc');
    // }
}
