<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ShopUser extends Authenticatable
{
    use HasFactory;

    const GLOBAL_PHONE_CODE = '+995';

    protected $table = 'shop_users';

    protected $guard = 'shop_user';

    public $primaryKey = 'id';
    
    protected $fillable = [
        'name', 
        'surname', 
        'email', 
        'password', 
        'photo_path', 
        'phone1', 
        'phone2',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
