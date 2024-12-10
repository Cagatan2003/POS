<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    // Specify the custom primary key
    protected $primaryKey = 'Admin_Id';

    // Specify that this is not an auto-incrementing primary key
    public $incrementing = false;

    // Specify the guard for the admin
    protected $guard = 'admin';

    // The attributes that are mass assignable
    protected $fillable = [
        'AdminUsername', 'AdminFname', 'AdminMname', 'AdminLname', 'AdminGender', 
        'AdminBdate', 'AdminPhone', 'AdminAddress', 'AdminEmail', 'AdminPassword', 'AdminProfile'
    ];

    // The attributes that should be hidden for arrays
    protected $hidden = [
        'AdminPassword', 'remember_token',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
