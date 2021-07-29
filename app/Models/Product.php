<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;

class Product extends Model
{
    use HasFactory;

    const ACTION_PERCENT_ZERO           = 0;
    const ACTION_PRICE_ZERO             = '0.00';
    const PRODUCT_CATEGOTY_MAN          = 'კაცი';
    const PRODUCT_CATEGOTY_WOMAN        = 'ქალი';
    const PRODUCT_CATEGOTY_GLASS        = 'ჭიქა';
    const PRODUCT_CLOTHE_SIZE           = null;
    const PRODUCT_CATEGORY_TSHIRT       = 'მაისურები';
    const PRODUCT_ACCESSORIES_GLASS     = 'ჭიქები';
    const PRODUCT_ACCESSORIES_KEYCHAIN  = 'ბრელოკები';
    const PRODUCT_ACCESSORIES_PENS      = 'კალმები';
    const GEO_LARI_SYMBOL               = '₾';
    const ORDER_ASC                     = 'ASC';
    const ORDER_DESC                    = 'DESC';
    const PRICE                         = 'price';
    const NAME                          = 'name';
    const ACTION_PRICE                  = 'action_price';
    const DEFAULT_PRICE_RANGE           = 10000;
    const DEFAULT_PERCENT               = 100;
    const DEFAULT_PER_PAGE              = 20;

    protected $table = 'products';

    public $primaryKey = 'product_id';
    
    protected $fillable = [
            'product_id', 
            'name', 
            'category',
            'quantity',
            'price',
            'price_in_total',
            'action_percent',
            'discount',
            'action_price',
            'size',
            'image',
        ];

    
    public function reviews()
    {
        return $this->hasMany(Review::class, 'review_id', 'product_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'review_id');
    }

    public function priceWithDiscountAndWithoutDiscount()
    {
        if($this->action_percent == Product::ACTION_PERCENT_ZERO) {
            return Product::GEO_LARI_SYMBOL . $this->price;

        } else {
            return Product::GEO_LARI_SYMBOL . $this->action_price;
        }
    }

    public function subTotalPrice()
    {
        if($this->action_percent == Product::ACTION_PERCENT_ZERO) {
            return $this->price;

        } else {
            return $this->action_price;
        }
    }

    public function showOldPrice()
    {
        if($this->action_percent !== Product::ACTION_PERCENT_ZERO) {
            return $this->price;
        }
    }

    public function showHideDiscountPercent()
    {
        if($this->action_percent !== Product::ACTION_PERCENT_ZERO) {
            return $this->action_percent . '%  off';
        }
    }
}
