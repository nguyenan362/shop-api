<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_category_product extends Model
{
    use HasFactory;

    protected $fillable = [
        'cate_id',
        'cate_name',
        'cate_desc',
        'cate_status',
    ];
    public function tbl_product()
    {
        return $this->hasMany(tbl_product::class);
    }
}
