<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'desc',
        'price',
        'image',
        'status',
    ];

    public function orderdetail() {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }

    public function category() {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
