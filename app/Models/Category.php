<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    public $primaryKey = 'id';
    
    protected $fillable = ['name', 'parent_id', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'name', 'category');
    }

    public function productCategory()
    {
        return $this->hasMany(Product::class, 'category', 'name');
    }
}
