<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
   
    
    public function rules()
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        if(request()->has('role')){
            $role = ['phone'=>'required'];
            $rules = array_merge($rules,$role);
        }

        return $rules;
    }
}
