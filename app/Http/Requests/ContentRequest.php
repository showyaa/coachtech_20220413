<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|max:20',
        ];
    }
    public function messages()
    {
        return [
            'content.required' => '入力してください',
            'content.max' => '20文字以内で入力してください'
        ];
    }
}
