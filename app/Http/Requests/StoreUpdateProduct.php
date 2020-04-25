<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
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
            'sku' => 'required|unique:products',
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'sku.required' => 'Informar o SKU',
            'sku.unique'  => 'Já existe esse SKU cadastrado',
            'name.required' => 'Informar o nome'
        ];
    }
}
