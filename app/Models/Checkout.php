<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkouts';

    public $primaryKey = 'id';
    
    protected $fillable = [
            'address_id', 
            'checkout_id', 
            'user_id',
        ];

}
