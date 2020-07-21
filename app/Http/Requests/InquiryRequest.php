<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'inquiry' => 'required|max:1000'
        ];
    }
    
    public function messages() {
        return [
            'inquiry.required' => '内容を1000文字以内で記入して下さい。',
        ];
    }

}
