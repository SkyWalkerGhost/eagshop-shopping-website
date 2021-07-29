<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ShopUser;
use App\Models\Category;
use App\Models\Visitor;
use Illuminate\Http\Request;

class AdminPageRepository
{
    public function __construct(
        Request $request, 
        Product $product, 
        ShopUser $shopUser, 
        Category $category, 
        Visitor $visitor)  {

            $this->request  = $request;
            $this->product  = $product;
            $this->shopUser = $shopUser;
            $this->category = $category;
            $this->visitor  = $visitor;
    }

    public function productCount()
    {
        return $this->product->count();
    }

    public function totalPrice()
    {
        return $this->product->sum('price_in_total');
    }

    public function totalProductionQuantity()
    {
        return $this->product->sum('quantity');
    }

    public function numberOfShopUser()
    {
        return $this->shopUser->count();
    }

    public function numberOfCategory()
    {
        return $this->category->count();
    }

    public function productTable()
    {
        return $this->product->orderBy('id', 'DESC')->paginate(10);
    }

    public function getCategory()
    {
        return $this->category->latest()->get();
    }

    public function visitorCount()
    {
        return $this->visitor->count();
    }

    public function visitorData()
    {
        return $this->visitor->paginate(10);
    }

    public function deleteVisitorRow()
    {
        $this->visitor->where('id', $this->request->id)->firstOrFail()->delete();
    }
}
