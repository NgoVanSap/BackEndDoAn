<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'tenKhoaHoc',
        'moTa',
        'linkVideo',
        'tenKhoaHoc',
        'giaCa',
        'trangThai',
        'idGiangVien',
        'idDanhMuc',
        'idNguoiDung',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
