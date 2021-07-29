<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopUserController extends Controller
{
    public function dashboard()
    {
        return view('front.account.dashboard');
    }

    public function order()
    {
        return view('front.account.order');
    }

    public function myWishlist()
    {
        return view('front.account.wishlist');
    }

    public function myCart()
    {
        return view('front.account.cart');
    }

    public function address()
    {
        return view('front.account.address');
    }

    public function checkout()
    {
        return view('front.account.checkout.index');
    }
}
