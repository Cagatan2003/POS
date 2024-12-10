<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customerId'; // Custom primary key
    protected $fillable = [
        'Admin_Id', 'AdminFname', 'AdminMname', 'AdminLname', 'AdminSname', 'AdminPhone', 'AdminAddress'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'Admin_Id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customerId');
    }
}
