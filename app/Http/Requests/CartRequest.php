<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'datetime_first' => 'required',
            'datetime_last' =>  'required',
            'datetime_last' => 'after_or_equal:datetime_first',
        ];
    }

    public function messages()
    {
        return [
            'datetime_first.required' => '納品日を選択して下さい。',
            'datetime_last.required' => '期間を選択して下さい。',
            'datetime_last.after_or_equal' => '期間は納品日と同日か後の日付を選択して下さい。',
        ];
    }
}
