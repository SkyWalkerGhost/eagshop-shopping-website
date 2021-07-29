<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public $primaryKey = 'id';
    
    protected $fillable = [
            'order_id', 
            'user_name', 
            'user_id',
            'user_ip',
        ];

    public function product()
    {
        return $this->hasMany(Product::class, 'product_id', 'order_id');
    }
    
    public function cart()
    {
        return $this->hasMany(Cart::class, 'cart_id', 'order_id')
                    ->join('products', 'carts.cart_id', 'products.product_id')
                    ->select('carts.*', DB::raw('carts.quantity * IF(products.action_percent = 0, products.price, products.action_price) as product_total_price'));
    }

    public function order()
    {
        return $this->belongsToMany(Order::class, 'order_id', 'product_id');
    }

}
