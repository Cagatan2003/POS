<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $primaryKey = 'invoiceId';  // Define primary key if not 'id'
    protected $fillable = [
        'orderId',
        'totalAmount',
        'paymentType',
        'Gcash_receipt',
        'amountPaid',
        'changeGiven',
    ];

    // Define the relationship with the orders table
    public function order()
    {
        return $this->belongsTo(Order::class, 'orderId', 'orderId');
    }
}
