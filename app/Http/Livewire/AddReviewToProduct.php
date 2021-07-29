<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Review;
use Auth;

class AddReviewToProduct extends Component
{
    public $review_id;
    public $review_name;
    public $star;

    public function rules()
    {
        return [
            'review_name' => ['required', 'max:500'],
            'star' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'review_name.required' => 'შეფასების ტექსტი არ არის',
            'review_name.max' => 'შეფასების ტექსტი დიდია',
            'star.required' => 'აირჩიეთ შეფასების ნიშნული',
        ];
    }

    public function addReview($review_id)
    {
        $this->review_id = $review_id;

        $this->validate();

        Review::create([
            'review_id' => $this->review_id,
            'review_name' => $this->review_name,
            'star' => $this->star,
            'user_name' => Auth::guard('shop_user')->user()->name,
            'user_id' => Auth::guard('shop_user')->user()->id,
            'user_ip' => request()->ip(),
        ]);

        $this->resetErrorBag();
        $this->resetValidation();
        $this->cleanInput();
        $this->dispatchBrowserEvent('swal', [
                'title' => 'თქვენი შეფასება მიღებულია', 
                'icon' => 'success',
            ]);
        }

    public function cleanInput()
    {
        $this->review_name = null;
        $this->star = null;
    }


    public function render()
    {
        return view('livewire.add-review-to-product');
    }
}
