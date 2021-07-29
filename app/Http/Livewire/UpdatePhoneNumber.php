<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ShopUser;
use Auth;

class UpdatePhoneNumber extends Component
{
    public $phone1;
    public $phone2;

    public function rules()
    {
        return [
            'phone1' => ['required', 'regex:/[0-9]{9}/'],
            'phone2' => ['nullable', 'regex:/[0-9]{9}/'],
        ];
    }

    public function phone()
    {
        $this->validate();

        $shopUser = ShopUser::findOrFail(Auth::guard('shop_user')->user()->id);
        $shopUser->update($this->validate());
        
        return redirect()->route('front.account.dashboard');

        $this->resetErrorBag();
        $this->resetValidation();
        $this->cleanInput();
        
    }

    public function cleanInput()
    {
        $this->phone1 = null;
        $this->phone2 = null;
    }

    public function render()
    {
        return view('livewire.update-phone-number');
    }
}
