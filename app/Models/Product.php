<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        protected $primaryKey = 'productId';

    // If you are using non-incrementing primary keys
    public $incrementing = true;
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'productName',
        'productDescription',
        'productPrice',
        'productStock',
        'categoryId',
        'productAvailability',
        'ProductImage',
    ];

    // Define relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
