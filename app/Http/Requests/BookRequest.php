<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'author' => 'required',
            'title' => 'required|max:50',
            'translation' => 'required|max:60',
            'publication_date' => 'required|date_format:Y-m-d|before_or_equal:today'
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Autor jest wymagany',
            'title.required' => 'Tutuł jest wymagany',
            'translation.required' => 'Język/Tłumaczenie jest wymagane',
            'publication_date.required' => 'Data wydania jest wymagana',
            'publication_date.before_or_equal' => 'Data wydania nie może być z przyszłości',
            'publication_date.date_format' => 'Dozwolony format daty YYYY-MM-DD'
        ];
    }
}
