<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    use HasFactory;

    protected $table = 'product_views';

    public $primaryKey = 'id';
    
    protected $fillable = [
            'product_id', 
            'user_name', 
            'user_id',
            'user_ip',
            'number_of_views', 
        ];
}
