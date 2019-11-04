<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookSearchRequest extends FormRequest
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
            'title' => 'required|max:50',
            'content' => 'required|max:60'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tutuł jest wymagany',
            'content.required' => 'Fragment jest wymagany',
            'content.max' => 'Fragment jest zbyt długi'
        ];
    }
}
