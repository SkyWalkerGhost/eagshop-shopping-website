<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductRepository
{
    public $discountPrice;

    public function __construct(Request $request, Product $product)
    {
        $this->request = $request;
        $this->product = $product;
    }

    public function generateProductId()
    {
        return Str::substr(str_shuffle(12345787154321), 0, 12);
    }

    public function totalPrice()
    {
        return $this->request->price * $this->request->quantity;
    }

    public function discount()
    {
        return ($this->request->price / 100) * $this->request->action_percent;
    }

    public function actionPrice()
    {
        return $this->request->action_percent == 0 ? 0 : ($this->request->price - $this->discount());
    }

    public function createProduct()
    {
        return [
            'product_id'        => $this->generateProductId(),
            'name'              => $this->request->name,
            'category'          => $this->request->category,
            'quantity'          => $this->request->quantity,
            'price'             => $this->request->price,
            'price_in_total'    => $this->totalPrice(),
            'action_percent'    => $this->request->action_percent,
            'discount'          => $this->discount(),
            'action_price'      => $this->actionPrice(),
            'size'              => $this->request->size,
            'image'             => $this->request->image->store('public/product_image'),
        ];
    }


    /**
    * start update functionality
    * 
    */

    public function getProductItem()
    {
        return $this->product->where('id', $this->request->id)->firstOrFail();
    }

    public function imagePath()
    {
        return public_path() . '/storage' . str_replace('public', "", $this->getProductItem()->image);
    }

    public function checkImageExists()
    {
        return $this->request->hasFile('image') 
                        ? $this->request->file('image')->store('public/product_image') 
                        : $this->getProductItem()->image;
    }

    public function removeImage()
    {
        if($this->request->hasFile('image')) {

            if(File::exists($this->imagePath())) {
                File::delete($this->imagePath());
            }
        }
    }

    public function updateProduct()
    {
        $this->removeImage();

        return [
            'name'              => $this->request->name,
            'category'          => $this->request->category,
            'quantity'          => $this->request->quantity,
            'price'             => $this->request->price,
            'price_in_total'    => $this->totalPrice(),
            'action_percent'    => $this->request->action_percent,
            'discount'          => $this->discount(),
            'action_price'      => $this->actionPrice(),
            'size'              => $this->request->size,
            'image'             => $this->checkImageExists(),
        ];
    }

}
