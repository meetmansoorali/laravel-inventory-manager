<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- Add this import
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory; // <--- Add this line here

    protected $fillable = ['name', 'sku', 'price', 'stock_quantity'];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}