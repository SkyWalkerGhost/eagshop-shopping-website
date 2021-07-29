<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Auth;

class ShopUserDashboardCart extends Component
{
    public $order_id;
    public $order_quantity;

    public function myCart()
    {
        return Cart::with('product')->where('user_ip', request()->ip())->latest()->get();
    }

    public function removeFromCart($cart_id)
    {
        $this->cart_id = $cart_id;

        Cart::where('user_ip', request()->ip())
                    ->where('cart_id', $this->cart_id)
                        ->where('user_id', Auth::guard('shop_user')->user()->id)
                            ->delete();

        $this->emit('refreshItemsInCart'); 

            $this->dispatchBrowserEvent('swal', [
                    'title' => 'პროდუქცია წაშლილია კალათიდან', 
                    'icon' => 'success',
                ]);
    }


    public function addToOrder($order_id)
    {
        $this->order_id = $order_id;

        if(Order::where('order_id', $this->order_id)->where('user_ip', request()->ip())->doesntExist()) {

            Order::create([
                'order_id' => $this->order_id,
                'user_name' => Auth::guard('shop_user')->user()->name,
                'user_id' => Auth::guard('shop_user')->user()->id,
                'user_ip' => request()->ip(),
            ]);

            $this->emit('refreshItemsInCart'); 
            
            $this->dispatchBrowserEvent('swal', [
                    'title' => 'პროდუქცია დამატებულია შეკვეთებში', 
                    'icon' => 'success',
                ]);
            
        } else {
            $this->dispatchBrowserEvent('swal', [
                    'title' => 'თქვენ უკვე დაამატეთ ეს პროდუქცია შეკვეთაში', 
                    'icon' => 'info',
                ]);
        }
    }

    public function render()
    {
        return view('livewire.shop-user-dashboard-cart', [
            'myCart' => $this->myCart(),
        ]);
    }
}
