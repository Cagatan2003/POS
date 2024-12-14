<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cashier extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'cashier_id';

    protected $fillable = [
        'CashierUsername',
        'CashierEmail',
        'CashierFname',
        'CashierMname',
        'CashierLname',
        'CashierBdate',
        'CashierPhone',
        'CashierAddress',
        'CashierGender',
        'CashierProfile',
        'CashierPass',
        'CashierStatus',
    ];

    protected $hidden = [
        'CashierPass',
        'remember_token',
    ];

    // Password Mutator to hash password before saving
    public function setCashierPassAttribute($value)
    {
        $this->attributes['CashierPass'] = bcrypt($value);
    }
}
