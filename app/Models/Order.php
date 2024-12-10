<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'orderId'; // Custom primary key
    protected $fillable = [
        'cashier_id', 'customerId', 'totalAmount'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerId');
    }

    public function cashier()
    {
        return $this->belongsTo(Cashier::class, 'cashier_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'orderId');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'orderId');
    }
}
