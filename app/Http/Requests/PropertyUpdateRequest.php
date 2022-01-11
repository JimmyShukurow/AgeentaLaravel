<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyUpdateRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'title' => 'nullable',
            'description' => 'nullable',
            'content' => 'nullable',
            'type_id' => 'nullable',

        ];
    }
}
