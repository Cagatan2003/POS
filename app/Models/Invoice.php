<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $primaryKey = 'invoiceId'; // Custom primary key
    protected $fillable = [
        'orderId', 'totalAmount', 'amountPaid', 'changeGiven'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderId');
    }
}
