<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Http\Request;

class GetProduct extends Component
{
    public $wishlist_id;
    public $cart_id;
    public $perPage = 10;

    public function addToWishlist($wishlist_id)
    {
        $this->wishlist_id = $wishlist_id;

        if(Wishlist::where('wishlist_id', $this->wishlist_id)
                ->where('user_ip', request()->ip())->doesntExist()) {

            Wishlist::create([
                'wishlist_id' => $this->wishlist_id,
                'user_ip' => request()->ip(),
            ]);

            $this->emit('refreshItemsInCart');  # refresh product item in cart sidebar section
            
            $this->dispatchBrowserEvent('swal', [
                    'title' => 'პროდუქცია დამატებულია სურვილების სიაში', 
                    'icon' => 'success',
                ]);

        } else {
            $this->dispatchBrowserEvent('swal', [
                    'title' => 'თქვენ უკვე დაამატეთ ეს პროდუქცია სურვილების სიაში', 
                    'icon' => 'info',
                ]);
        }
    }


    public function addToCart($cart_id)
    {
        $this->cart_id = $cart_id;

        if(Cart::where('cart_id', $this->cart_id)->where('user_ip', request()->ip())->doesntExist()) {

            Cart::create([
                'cart_id' => $this->cart_id,
                'user_ip' => request()->ip(),
            ]);

            $this->emit('refreshItemsInCart'); 
            
            $this->dispatchBrowserEvent('swal', [
                    'title' => 'პროდუქცია დამატებულია კალათაში', 
                    'icon' => 'success',
                ]);
            
        } else {
            $this->dispatchBrowserEvent('swal', [
                    'title' => 'თქვენ უკვე დაამატეთ ეს პროდუქცია კალათაში', 
                    'icon' => 'info',
                ]);
        }
    }

    public function suggestProducts()
    {
        return Product::with('reviews')
                        ->where('category', Product::PRODUCT_CATEGORY_TSHIRT)
                        ->orderBy('id', 'DESC')
                        ->take($this->perPage)
                        ->get();
    }
    
    public function productAccessories()
    {
        return Product::with('reviews')
                        ->whereIn('category', [
                                Product::PRODUCT_ACCESSORIES_GLASS, 
                                Product::PRODUCT_ACCESSORIES_PENS, 
                                Product::PRODUCT_ACCESSORIES_KEYCHAIN,
                        ])->orderBy('id', 'DESC')
                            ->take($this->perPage)
                            ->get();
    }

    public function render()
    {
        return view('livewire.get-product', [
            'suggestProducts' => $this->suggestProducts(),
            'productAccessories' => $this->productAccessories(),
        ]);
    }
}
