<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Brian2694\Toastr\Facades\Toastr;

class LoginRequest extends FormRequest
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
            // 'email' => 'required|email',
            'password' => 'required| min:6',

        ];
    }

    public function messages()
    {
        return[
            // 'email.required' => __('login.email.required'),
            // 'name.required' => 'Name is required!',
            // 'password.required' => 'Password is required!'
        ];
        
    }



}
