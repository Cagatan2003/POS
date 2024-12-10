<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReport extends Model
{
    use HasFactory;

    protected $primaryKey = 'reportId'; // Custom primary key
    protected $fillable = [
        'invoiceId', 'Admin_Id', 'totalSales', 'expense_id', 'total_amount', 'netProfit'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoiceId');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'Admin_Id');
    }

    public function expense()
    {
        return $this->belongsTo(Expense::class, 'expense_id');
    }
}
