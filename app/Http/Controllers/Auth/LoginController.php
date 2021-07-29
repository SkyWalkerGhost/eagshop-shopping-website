<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:shop_user')->except('logoutShopUser');
    }


    public function shopUserLoginPage()
    {
        return view('auth.shop_user_login');
    }

    public function shopUserLogin(Request $request)
    {   
        $request->validate([
                            'email' => ['required'],
                            'password' => ['required'],
                        ]);

        if(Auth::guard('shop_user')->attempt(['email' => $request->email, 'password' => $request->password])) {
        
            return redirect()->route('front.index');

        } else {

            return back()->with('info', 'ელ-ფოსტა ან პაროლი არასწორია');
        }
    }

    public function logoutShopUser(Request $request)
    {
        if(Auth::guard('shop_user')->check()) {

            Auth::guard('shop_user')->logout();

            return redirect()->route('front.index');
        }
    }
}
