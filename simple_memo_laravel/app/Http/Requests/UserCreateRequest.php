<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

     //リクエストを送れる権限があるかの判定を返す
     //ture:OK　false:NG(403エラーを返す)
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
            'name' => 'required|max:255|regex:/^[a-zA-Z0-9]+$/',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|max:255|min:8|regex:/^[a-zA-Z0-9]+$/',
        ];
    }

    //オリジナルメッセージを用意できる
    public function messages()
    {
        return [
            'name.regex' => ':attributeは半⾓英数字で⼊⼒してください。',
            'password.regex' => ':attributeは半⾓英数字で⼊⼒してください。',
        ];
    }
}
