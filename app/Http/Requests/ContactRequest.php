<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'  => 'required|max:20',
            'email' => 'required|email',
            'text'  => 'required|max:1000'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Вы не указали поле :attribute',
            'max'      => 'Количество символово в поле :attribute, должно быть больше :max',
            'email'    => 'Укажите корректный :attribute'
        ];
    }
}
