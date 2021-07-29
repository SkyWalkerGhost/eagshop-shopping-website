<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Address;
use Auth;

class CreateUserAddress extends Component
{
    public $street_address;
    public $city;
    public $id_card_number;
    public $update_id;
    public $remove_id;

    public function rules()
    {
        return [
            'street_address' => ['required', 'max:150'],
            'city' => ['required', 'string', 'max:30'],
            'id_card_number' => ['required', 'regex:/[0-9]{11}/'],
        ];
    }

    public function messages()
    {
        return [
            'street_address.required' => 'მიუთითეთ თქვენი მისამართი !',
            'street_address.max' => 'მისამართის სახელი დიდია !',

            'city.required' => 'დაამატე ქალაქი !',
            'city.max' => 'ქალაქის სახელი დიდია !',

            'id_card_number.required' => 'მიუთითეთ პირადი ნომერი !',
            'id_card_number.regex' => 'პირადი ნომერი უნდა შეიცავდეს 11 რიცხვს !',
        ];
    }

    public function createAddress()
    {
        $this->validate();

        Address::create([
            'street_address' => $this->street_address,
            'city' => $this->city,
            'id_card_number' => $this->id_card_number,
            'user_name' => Auth::guard('shop_user')->user()->name,
            'user_id' => Auth::guard('shop_user')->user()->id,
            'user_ip' => request()->ip(),
        ]);

        $this->dispatchBrowserEvent('swal', [
                    'title' => 'თქვენი მისამართი დამატებულია', 
                    'icon' => 'success',
                ]);

        $this->resetErrorBag();
        $this->resetValidation();
        $this->cleanInput();
    }


    public function updateAddress($update_id)
    {
        $this->update_id = $update_id;

        $this->validate();

        $adress = Address::where('id', $this->update_id)
                            ->where('user_id', Auth::guard('shop_user')->user()->id)
                                ->firstOrFail();

        $adress->update([
            'street_address' => $this->street_address,
            'city' => $this->city,
            'id_card_number' => $this->id_card_number,
        ]);

        $this->dispatchBrowserEvent('swal', [
                    'title' => 'თქვენი მისამართი განახლებულია', 
                    'icon' => 'success',
                ]);

        $this->resetErrorBag();
        $this->resetValidation();
        $this->cleanInput();
    }

    public function removeAddress($remove_id)
    {   
        $this->remove_id = $remove_id;

        Address::where('id', $this->remove_id)
                            ->where('user_id', Auth::guard('shop_user')->user()->id)
                                ->firstOrFail()->delete();

        $this->dispatchBrowserEvent('swal', [
                    'title' => 'თქვენი მისამართი წაშლილია', 
                    'icon' => 'success',
                ]);
    }

    public function cleanInput()
    {
        $this->street_address = null;
        $this->city = null;
        $this->id_card_number = null;
    }

    public function render()
    {
        $myAddress = Address::latest()->get();

        return view('livewire.create-user-address', ['myAddress' => $myAddress]);
    }
}
