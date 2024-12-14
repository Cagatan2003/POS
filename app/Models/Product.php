<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'products';

    // The primary key for the model
    protected $primaryKey = 'productId';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'categoryId', 
        'productName', 
        'productDescription', 
        'productPrice', 
        'productStock', 
        'productPullout', 
        'productSold', 
        'productRemaining', 
        'productAvailability', 
        'ProductImage'
    ];

    // Optionally, you can define relationships with other models

    // A product belongs to a category (assuming the categories table exists)
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'id');
    }

    // You can also define any other relationships such as orders or reviews if applicable.
}
