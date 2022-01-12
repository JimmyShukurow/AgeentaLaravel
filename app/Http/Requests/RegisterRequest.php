<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
   
    
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'mobile_number' => 'required'
        ];
        if(request()->has('role') && request()->role == 'corporate'){
            $extra_rule = [
                'company_official_name'=>'required',
                'tax_office_number'=>'required',
                'real_estate_trade_authorization_number'=>'required',
                'company_website'=>'required',
                'company_logo'=>'required',
                'company_email' => 'required',
                'address'=>'required',
                'company_representative_name_and_surname'=>'required',
                'phone_number'=>'required',
            ];

            $rules = array_merge($rules, $extra_rule);
        }

        return $rules;
    }
}
