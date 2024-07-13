<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'brand_name',
        'brand_desc',
        'brand_status',
    ];
    public function tbl_product()
    {
        return $this->hasMany(tbl_product::class, 'brand_id', 'brand_id');
    }
}
