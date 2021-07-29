<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Address;
use App\Models\Cart;
use Illuminate\Http\Request;
use Auth;

class CheckoutProduct extends Component
{
    public function getAddress()
    {
        return Address::where('user_id', Auth::guard('shop_user')->id())->latest()->get();
    }
    public function render()
    {
        return view('livewire.checkout-product', [
            'myAddress' => $this->getAddress(),
        ]);
    }
}
