<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class GetProductCategoryPage extends Component
{
    public $wishlist_id;
    public $cart_id;
    public $perPage = 20;
    public $sort;
    public $suggestProductCategory;
    public $categories;
    public $getProductByPercent;
    public $price_range = 20;

    protected $listeners = ['refreshCart' => '$refresh'];

    public function addToWishlist($wishlist_id)
    {
        $this->wishlist_id = $wishlist_id;

        if(Wishlist::where('wishlist_id', $this->wishlist_id)
                ->where('user_ip', request()->ip())->doesntExist()) {

            Wishlist::create([
                'wishlist_id' => $this->wishlist_id,
                'user_name' => 'Avto',
                'user_id' => 1,
                'user_ip' => request()->ip(),
            ]);

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
                'user_name' => 'Avto',
                'user_id' => 1,
                'user_ip' => request()->ip(),
            ]);

            $this->emit('refreshItemsInCart');  # refresh product item in cart sidebar section
            $this->emit('refreshCart');
            
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

    public function render()
    {
        return view('livewire.get-product-category-page');
    }
}
