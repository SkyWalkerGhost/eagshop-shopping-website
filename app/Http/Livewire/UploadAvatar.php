<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ShopUser;
use Livewire\WithFileUploads;
use Auth;

class UploadAvatar extends Component
{
    use WithFileUploads;

    public $photo_path;

    public function rules()
    {
        return [
            'photo_path' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:512'],
        ];
    }

    public function messages()
    {
        return [
            'photo_path.required' => 'აირჩიეთ ავატარის სურათი !',
            'photo_path.mimes' => 'მხოლოდ JPEG, JPG, PNG, GIF გაფართოების სურათები !',
            'photo_path.max' => 'ფაილი დიდია ასატვირთად !',
        ];
    }

    public function store()
    {
        $this->validate();

        $shopUser = ShopUser::findOrFail(Auth::guard('shop_user')->user()->id);

        $shopUser->update([
                'photo_path' => $this->photo_path->store('/public/avatar')
            ]);
        
        return redirect()->route('front.account.dashboard');

        $this->resetErrorBag();
        $this->resetValidation();
        
    }

    public function render()
    {
        return view('livewire.upload-avatar');
    }
}
