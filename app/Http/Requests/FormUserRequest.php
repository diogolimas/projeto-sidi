<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUserRequest extends FormRequest
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
            'name' => 'required',
            'email' =>  'required',
            'password'  =>  'required|confirmed',
            'password_confirmation'  =>  'required',
            'papel_id'  =>  'required',


        ];
    }
    public function messages()
    {
        return [
            'name.required'     => 'O campo nome é de preenchimento obrigatório',
            'email.required'     => 'O campo email é de preenchimento obrigatório',
            'password.required'     => 'A senha é de preenchimento obrigatório é de preenchimento obrigatório',
            'papel_id.required'     => 'O tipo de usuário é de preenchimento obrigatório',
            'password_confirmation.required'     => 'A confirmação da senha é preenchimento obrigatório',
        ];
    }
}
