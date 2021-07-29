<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ShopUser;
use App\Models\Category;
use App\Models\Review;
use App\Models\ProductView;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use DB;

class FrontRepository
{
    public $sort;

    public function __construct(
        Request $request, 
        Product $product, 
        Review $review, 
        Category $category, 
        ProductView $productView)   {

            $this->request      = $request;
            $this->product      = $product;
            $this->review       = $review;
            $this->category     = $category;
            $this->productView  = $productView;
    }

    public function getCategory()
    {
        return $this->category->withCount(['productCategory'])->latest()->take(20)->get();
    }

    public function getPriceRange()
    {
        if(!empty($this->request->price_range)) {
            return $this->request->price_range;
        } else {
            return Product::DEFAULT_PRICE_RANGE;
        }
    }

    public function getProductByDiscount()
    {
        if($this->request->percent >= 0 && $this->request->percent <=100) {
           
            if(!empty($this->request->percent)) {
                return $this->request->percent;
            } else {
                return Product::DEFAULT_PERCENT;
            }
        }
    }

    public function productPerPage()
    {
        if(in_array($this->request->per_page, showProductPerPage())) {
            return $this->request->per_page;
        } else {
            return Product::DEFAULT_PER_PAGE;
        }
    }

    public function suggestCategory()
    {
        switch ($this->request->filter) {
            case 'price_asc':
                    $name   = Product::PRICE;
                    $order  = Product::ORDER_ASC;
                break;

            case 'price_desc':
                    $name   = Product::PRICE;
                    $order  = Product::ORDER_DESC;
                break;
            
            case 'name_asc':
                    $name   = Product::NAME;
                    $order  = Product::ORDER_ASC;
                break;

            case 'name_desc':
                    $name   = Product::NAME;
                    $order  = Product::ORDER_DESC;
                break;

            case 'action_price':
                    $name   = Product::ACTION_PRICE;
                    $order  = Product::ORDER_DESC;
                break;
            
            default:
                    $name   = 'id';
                    $order  = Product::ORDER_DESC;
                break;
        };

        return $this->product->with('reviews')
                    ->where('category', $this->request->name)
                    ->whereBetween('price', [0, $this->getPriceRange()])
                    ->whereBetween('action_percent', [0, $this->getProductByDiscount()])
                    ->take($this->productPerPage())
                    ->orderBy($name, $order)
                    ->get();
    }

    public function productView()
    {
        return $this->product->where('product_id', $this->request->product_id)->firstOrFail();
    }

    public function productReviews()
    {
        return $this->review->where('review_id', $this->request->product_id)->latest()->get();
    }

    public function getProductByPercent()
    {
        return $this->product->select('action_percent', 
                                        DB::raw('count(`action_percent`) as percentOfProduct'))
                                ->groupBy('action_percent')
                                ->get();
    }

    public function suggestProductCategory()
    {
        return $this->product->where('category', $this->productView()->category)
                                ->take(4)
                                ->latest()
                                ->inRandomOrder()
                                ->get();
    }

    public function getProductView()
    {
        return $this->productView->where('product_id', $this->request->product_id)->count();
    }

    public function searchProduct()
    {
        return QueryBuilder::for(Product::class)->allowedFilters('name')->get();

    }
}
