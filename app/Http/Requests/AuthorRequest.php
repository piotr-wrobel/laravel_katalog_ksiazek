<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name' => 'required|max:40',
            'surname' => 'required|max:40',
            'country' => 'required|max:60'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Imię jest wymagane',
            'surname.required' => 'Nazwisko jest wymagane',
            'country.required' => 'Kraj jest wymagany',
            'name.max' => 'Imię ma więcej niż :max znaków',
            'surname.max' => 'Nazwisko ma więcej niż :max znaków',
            'country.max' => 'Kraj ma więcej niż :max znaków'
        ];
    }
}
