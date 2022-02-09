<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user_name' => ['required', 'max:20'],

        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'ユーザー名は必ず入力してください。',
            'user_name.max' => 'ユーザー名は最大２０文字まで入力可能です。'
        ];
    }
}
