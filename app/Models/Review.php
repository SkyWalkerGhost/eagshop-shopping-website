<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'product_reviews';

    public $primaryKey = 'review_id';
    
    protected $fillable = [
            'review_id', 
            'review_name', 
            'star', 
            'user_name', 
            'user_id',
            'user_ip',
        ];
}
