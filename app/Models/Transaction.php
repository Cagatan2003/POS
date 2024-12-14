<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_type',
        'payment_method',
        'amount_paid',
        'total_amount',
        'gcash_receipt_no',
    ];
}
