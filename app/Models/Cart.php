<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    public $primaryKey = 'id';
    
    protected $fillable = [
            'cart_id', 
            'quantity', 
            'user_ip',
        ];

    public function product()
    {
        return $this->hasMany(Product::class, 'product_id', 'cart_id');
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class, 'product_id', 'cart_id');
    }

    public function totalQuantity()
    {
        return $this->quantity;
    }
}
