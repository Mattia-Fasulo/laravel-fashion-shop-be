<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products|max:100|min:3',
            'description' => 'nullable',
            'cover_image' => 'nullable|image',
            'type_id' => 'nullable|exists:types,id',
            'texture_id' => 'nullable|exists:textures,id',
            'brand_id' => 'nullable|exists:brands,id',
            'rating' => 'nullable',
            'price' => 'nullable',
            'price_sign' => 'nullable',

        ];
    }
}
