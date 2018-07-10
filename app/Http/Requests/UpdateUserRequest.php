<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //protected $id;
    protected $redirect = '';
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'         =>  'required|email',
            'username'      =>  'required|min:2|max:25',
            'first_name'    =>  'required|min:2|max:25',
            'last_name'     =>  'required|min:2|max:25'
        ];
    }
}
