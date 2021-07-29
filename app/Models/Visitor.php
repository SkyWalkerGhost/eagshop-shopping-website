<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $table = 'visitors';

    public $primaryKey = 'id';
    
    protected $fillable = [
            'user_ip',
            'browser',
            'platform',
            'is_phone',
            'is_desktop',
            'country',
            'city',
            'region_name',
            'page_url',
        ];
}
