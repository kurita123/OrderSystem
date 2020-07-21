<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Change extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product' => 'required',
            'price'   => 'required|integer',
            'amount'  => 'required|max:6',
            'stocks'  => 'required|integer',
        ];
    }
    
    public function messages() {
        return [
            'product.required' => '商品名を記入して下さい。',
            'price.required'   => '価格を入力して下さい。',
            'amount.required'  => '量を入力して下さい。',
            'stocks.required'  => '在庫量を入力して下さい。',
        ];
    }
}
