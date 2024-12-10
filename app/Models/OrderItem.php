<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_itemId'; // Custom primary 
      protected $table = 'order_items';
    protected $fillable = [
        'orderId', 'productId', 'quantity', 'price', 'subtotal'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderId');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
