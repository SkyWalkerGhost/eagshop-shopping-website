<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class GetProductCategory extends Component
{
    use WithFileUploads, WithPagination;

    public $name;
    public $image;

    public $loadMore = 10;
    public $category_id;

    protected $listeners = ['refreshParentCategory' => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    public function rules()
    {
        return [
            'name' => ['required', 'max:30'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png,gif', 'max:512'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'დაამატეთ კატეგორია',
            'name.max' => 'კატეგორიის სახელი დიდია',
            'image.mimes' => 'მხოლოდ JPEG, JPG, PNG, GIF გაფართოების სურათები !',
            'image.max' => 'ფაილი დიდია ასატვირთად !',
        ];
    }


    public function loadMoreCategory()
    {
        $this->loadMore = $this->loadMore + 5;
    }

    public function update($category_id)
    {
        $this->category_id = $category_id;
        
        $this->validate();

        $update = Category::where('id', $this->category_id)->firstOrFail();
        
        $removeBlogImg  = public_path() . '/storage' . 
                            str_replace('public', "", $update->image);

        if(!empty($this->image)) {

            if(File::exists($removeBlogImg)) {
                File::delete($removeBlogImg);
            }
        }
        
        $image = empty($this->image) ? $update->image : $this->image->store('public/cat_img');

        $update->update(['name' => $this->name, 'image' => $image]);

        session()->flash('success', 'კატეგორია განახლებულია');

        $this->resetErrorBag();
        $this->resetValidation();
        $this->clearInput();
        
    }

    public function delete($category_id)
    {
        $this->category_id = $category_id;

        $category = Category::where('id', $this->category_id)->firstOrFail();
        $removeImg  = public_path() . '/storage' . str_replace('public', "", $category->image);

        if(File::exists($removeImg)) {
            File::delete($removeImg);
        }

        $category->delete();
    }

    public function clearInput()
    {
        $this->name = null;
        $this->image = null;
    }

    public function getCategory()
    {
        return Category::withCount(['productCategory'])->take($this->loadMore)->latest()->get();
    }

    public function render()
    {
        return view('livewire.get-product-category', [
            'categories' => $this->getCategory(),
        ]);
    }
}
