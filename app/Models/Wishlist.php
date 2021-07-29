<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    public $primaryKey = 'wishlist_id';
    
    protected $fillable = [
            'wishlist_id', 
            'user_ip',
        ];

    public function product()
    {
        return $this->hasMany(Product::class, 'product_id');
    }

    public function wishlist()
    {
        return $this->belongsToMany(Wishlist::class, 'wishlist_id');
    }
}
