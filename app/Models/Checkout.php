<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'shipping_fee',
        'shipping_address',
        'status',
        'total_price',
        'payment_method',
        'payment_status',
    ];

    public function tbl_product()
    {
        return $this->hasMany(tbl_product::class);
    }
    public function User()
    {
        return $this->hasMany(User::class);
    }
}
