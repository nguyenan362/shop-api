<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'cate_id',
        'product_name',
        'brand_id',
        'product_desc',
        'product_content',
        'product_price',
        'product_image',
        'product_status',
        'new',
    ];
    public function tbl_category_product()
    {
        return $this->belongsTo(tbl_category_product::class);
    }
    public function tbl_brand()
    {
        return $this->belongsTo(tbl_brand::class, 'brand_id', 'brand_id');
    }
    public function cart()
    {
        return $this->hasMany(Cart::class, 'product_id', 'product_id');
    }
    public function wishlist(){
        return $this->hasMany(Wishlist::class, 'product_id', 'product_id');
    }

    public function checkout(){
        return $this->hasMany(Checkout::class, 'product_id', 'product_id');
    }
}
