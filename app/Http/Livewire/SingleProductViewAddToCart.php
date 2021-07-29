<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Http\Request;
use Auth;

class SingleProductViewAddToCart extends Component
{
    public $wishlist_id;
    public $cart_id;
    public $quantity = 1;

    public function addToWishlist($wishlist_id)
    {
        $this->wishlist_id = $wishlist_id;

        if(Wishlist::where('wishlist_id', $this->wishlist_id)
                ->where('user_ip', request()->ip())->doesntExist()) {

            Wishlist::create([
                'wishlist_id' => $this->wishlist_id,
                'user_name' => Auth::guard('shop_user')->user()->name,
                'user_id' => Auth::guard('shop_user')->user()->id,
                'user_ip' => request()->ip(),
            ]);

            $this->emit('refreshItemsInCart'); 

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

    public function increment()
    {
        if($this->quantity !== 10) {
            $this->quantity++;
        }
    }

    public function decrement()
    {
        if($this->quantity !== 0) {
            $this->quantity--;
        }
    }

    public function addToCart($cart_id)
    {
        $this->cart_id = $cart_id;
        
        if($this->quantity <= 10) {

            if(Cart::where('cart_id', $this->cart_id)->where('user_ip', request()->ip())->doesntExist()) {

                $name = Auth::guard('shop_user')->check() 
                            ? Auth::guard('shop_user')->user()->name 
                            : null;

                $authId = Auth::guard('shop_user')->check() 
                            ? Auth::guard('shop_user')->user()->id 
                            : null;
                        
                Cart::create([
                    'cart_id' => $this->cart_id,
                    'user_name' => $name,
                    'user_id' => $authId,
                    'quantity' => $this->quantity,
                    'user_ip' => request()->ip(),
                ]);

                $this->emit('refreshItemsInCart'); 
                
                $this->dispatchBrowserEvent('swal', [
                        'title' => 'პროდუქცია დამატებულია კალათაში', 
                        'icon' => 'success',
                    ]);
                
            } else {

                Cart::where('cart_id', $this->cart_id)
                    ->where('user_ip', request()->ip())
                        ->update(['quantity' => $this->quantity]);

                $this->dispatchBrowserEvent('swal', [
                        'title' => 'პროდუქციის (' . $this->quantity . ') ერთეული დამატებულია კალათაში', 
                        'icon' => 'success',
                    ]);
            }

        } else {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'შეუძლებელია ამ რაოდენობის პროდუქციის დამატება', 
                'icon' => 'error',
            ]);
        }

    }

    public function render()
    {
        return view('livewire.single-product-view-add-to-cart');
    }
}
