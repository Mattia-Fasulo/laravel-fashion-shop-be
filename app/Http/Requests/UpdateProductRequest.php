<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'name' => ['required', Rule::unique('products')->ignore($this->product)],
            'description' => ['nullable'],
            'cover_image' => ['nullable', 'image', 'max:5000'],
            'type_id' => 'nullable|exists:types,id',
            'texture_id' => 'nullable|exists:textures,id',
            'brand_id' => 'nullable|exists:brands,id',
            'rating' => 'nullable',
            'price' => 'nullable',
            'price_sign' => 'nullable'
        ];
    }
}
