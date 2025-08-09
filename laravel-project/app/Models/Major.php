<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'majors'; // tên bảng (nếu không phải dạng số nhiều)

    protected $fillable = [
        'name',
        'description',
        'requirements',
        'career_opportunities',
    ];

    public $timestamps = true; // đảm bảo Laravel tự quản lý created_at, updated_at
}
