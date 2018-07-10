<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    protected $redirect = 'add_user';

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
            'first_name' => 'required|min:2|max:25',
            'last_name' => 'required|min:2|max:25',
            'username' => 'required|min:2|max:25',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:7',
            'status' => 'required'
        ];
    }
}
