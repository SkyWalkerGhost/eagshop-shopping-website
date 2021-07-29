<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class CreateProductCategory extends Component
{
    use WithFileUploads;

    public $name;
    public $image;

    public function rules()
    {
        return [
            'name' => ['required', 'max:30'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:512'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'დაამატეთ კატეგორია',
            'name.max' => 'კატეგორიის სახელი დიდია',
            'image.required' => 'დაამატეთ კატეგორიის ფოტო !',
            'image.mimes' => 'მხოლოდ JPEG, JPG, PNG, GIF გაფართოების სურათები !',
            'image.max' => 'ფაილი დიდია ასატვირთად !',
        ];
    }

    public function store()
    {
        $this->validate();

        if(Category::where('name', $this->name)->doesntExist()) {
            
            Category::create([
                    'name' => $this->name,
                    'image' => $this->image->store('/public/cat_img')
                ]);
            
            session()->flash('success', 'კატეგორია დამატებულია');

            $this->emit('refreshParentCategory');
            $this->resetErrorBag();
            $this->resetValidation();
            $this->clearInput();

        } else {
            session()->flash('info', 'ეს კატეგორია უკვე არსებობს');
        }
    }

    public function clearInput()
    {
        $this->name = null;
        $this->image = null;
    }

    public function render()
    {
        return view('livewire.create-product-category');
    }
}
