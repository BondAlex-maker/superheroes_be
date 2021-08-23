<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreationSuperheroRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nickname' => 'required|max:255',
            'real_name' => 'required|string|max:255',
            'origin_description' => 'required|string|max:500',
            'superpowers' => 'required|string|max:500',
            'catch_phrase' => 'required|string|max:500'
        ];
    }
}
