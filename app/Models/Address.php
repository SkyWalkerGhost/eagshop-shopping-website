<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    public $primaryKey = 'id';
    
    protected $fillable = [
            'address_id', 
            'city', 
            'street_address', 
            'user_name', 
            'user_id',
            'id_card_number',
            'user_ip',
        ];
}
