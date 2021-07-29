<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function store(StoreProductRequest $request)
    {
        Product::create($this->productRepository->createProduct());
        
        return back()->with('success', 'ახალი პროდუქცია დამატებულია');

    }

    public function update(UpdateProductRequest $request, $id)
    {
        $this->productRepository->getProductItem()->update($this->productRepository->updateProduct());
        
        return back()->with('success', 'პროდუქცია განახლებულია');
    }

    public function destroy($id)
    {
        $product   = Product::findOrFail($id);

        $removeBlogImg  = public_path() . '/storage' . str_replace('public', "", $product->image);
        
        if(File::exists($removeBlogImg)) {
            File::delete($removeBlogImg);
        }
        
        $product->delete();
        
        return back()->with('success', 'პროდუქცია წაშლილია');
    }
}
