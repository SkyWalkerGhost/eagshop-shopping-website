<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'name' => [
                'required', 
                'max:120',
            ],

            'category' => [
                'required', 
                'max:30',
            ],

            'quantity' => [
                'required', 
                'numeric',
            ],

            'price' => [
                'required',
            ],

            'action_percent' => [
                'required',
                'numeric',
            ],
            
            'size' => [
                'nullable',
            ],

            'image' => [
                'required',
                'image', 
                'mimes:jpg,jpeg,png', 
                'max:512',
            ],
        ];

    }


    public function messages()
    {
        return [
            'name.required' => 'შეიყვანეთ პროდუქციის სახელი !',
            'name.max' => 'პროდუქციის სახელი დიდია !' ,

            'category.required' => 'მიუთითეთ კატეგორიის სახელი !',
            'category.max' => 'კატეგორიის სახელი დიდია !',

            'quantity.required' => 'მიუთითეთ პროდუქციის რაოდენობა !',
            'quantity.numeric' => 'პროდუქციის რაოდენობა არ არის რიცხვითი !',

            'price.required' => 'მიუთითეთ პროდუქციის ფასი',
            
            'action_percent.required' => 'მიუთითეთ ფასდაკლების პროცენტი !',
            'action_percent.numeric' => 'ფასდაკლების უნდა შეიცავდეს რიცხვებს !',

            'image.required' => 'დაამატეთ პროდუქციის ფოტო(ებ)ი !' ,
            'image.mimes' => 'მხოლოდ JPEG, JPG, PNG გაფართოების სურათები !' ,
            'image.max' => 'ფაილი დიდია ასატვირთად !',
        ];
    }
}
