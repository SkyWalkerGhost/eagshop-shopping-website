<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Auth;

class HeaderCartItemWishlistAndCartQuantity extends Component
{
    protected $listeners = ['refreshItemsInCart' => '$refresh'];
    public $cart_id;
    public $product_id;

    public function removeProduct(int $cart_id)
    {
        $this->cart_id = $cart_id;
        Cart::where('user_ip', request()->ip())->where('cart_id', $this->cart_id)->delete();
    }

    public function cartItemsQuantity()
    {
        return Cart::with('product')->where('user_ip', request()->ip())->take(12)->latest()->get();
    }

    public function wishlistQuantity()
    {
        return Wishlist::where('user_ip', request()->ip())->latest()->count();
    }

    public function render()
    {
        return view('livewire.header-cart-item-wishlist-and-cart-quantity', [
            'itemsInCart' => $this->cartItemsQuantity(), 
            'wishlistQuantity' => $this->wishlistQuantity(),
        ]);
    }
}
