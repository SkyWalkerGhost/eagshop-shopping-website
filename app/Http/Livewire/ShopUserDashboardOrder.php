<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Product;
use Auth;

class ShopUserDashboardOrder extends Component
{
    public $order_id;

    public function order()
    {
        return Order::with('product')
                        ->with('cart')
                        ->where('user_id', Auth::guard('shop_user')->id())
                        ->latest()
                        ->get();
    }

    public function removeFromOrder($order_id)
    {
        $this->order_id = $order_id;

        Order::where('user_ip', request()->ip())
                    ->where('order_id', $this->order_id)
                        ->where('user_id', Auth::guard('shop_user')->user()->id)
                            ->delete();

        $this->emit('refreshItemsInCart');

        $this->dispatchBrowserEvent('swal', [
                'title' => 'პროდუქცია წაშლილია შეკვეთებიდან', 
                'icon' => 'success',
            ]);
    }


    public function render()
    {
        return view('livewire.shop-user-dashboard-order', ['orders' => $this->order()]);
    }
}
