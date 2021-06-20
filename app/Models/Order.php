<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'shipping_id',
        'payment_id',
        'total_price',
        'total_quantily',
        'status',
    ];

    public function user() {
        return $this->beLongtos(User::class, 'user_id');
    }

    public function shipping() {
        return $this->beLongtos(Shipping::class, 'shipping_id');
    }

    public function payment() {
        return $this->beLongtos(Payment::class, 'payment_id');
    }

    public function orderdetail() {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
