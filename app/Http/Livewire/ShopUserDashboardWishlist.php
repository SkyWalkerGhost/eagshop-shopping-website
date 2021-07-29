<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Product;
use Auth;

class ShopUserDashboardWishlist extends Component
{
    public $wishlist_id;
    public $cart_id;

    public function myWishlist()
    {
        return Wishlist::with('product')->where('user_ip', request()->ip())->latest()->get();
    }

    public function removeFromWishlist($wishlist_id)
    {
        $this->wishlist_id = $wishlist_id;

        Wishlist::where('user_ip', request()->ip())
                    ->where('wishlist_id', $this->wishlist_id)
                        ->where('user_id', Auth::guard('shop_user')->user()->id)
                            ->delete();

        $this->emit('refreshItemsInCart');  # refresh product item in cart sidebar section

            $this->dispatchBrowserEvent('swal', [
                    'title' => 'პროდუქცია წაშლილია სურვილების სიიდან', 
                    'icon' => 'success',
                ]);
    }


    public function addToCart($cart_id)
    {
        $this->cart_id = $cart_id;

        if(Cart::where('cart_id', $this->cart_id)->where('user_ip', request()->ip())->doesntExist()) {

            Cart::create([
                'cart_id' => $this->cart_id,
                'user_name' => Auth::guard('shop_user')->user()->name,
                'user_id' => Auth::guard('shop_user')->user()->id,
                'user_ip' => request()->ip(),
            ]);

            $this->emit('refreshItemsInCart');  # refresh product item in cart sidebar section
            
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
        return view('livewire.shop-user-dashboard-wishlist', [
            'myWishlist' => $this->myWishlist(),
        ]);
    }
}
