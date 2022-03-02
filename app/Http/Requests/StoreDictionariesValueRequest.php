<?php

namespace App\Http\Requests;

use App\Models\DictionariesValue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDictionariesValueRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dictionaries_value_create');
    }

    public function rules()
    {
        return [
            'diccionario_id' => [
                'required',
                'integer',
            ],
            'nombre' => [
                'string',
                'max:60',
                'required',
            ],
            'texto_inicial' => [
                'string',
                'max:60',
                'nullable',
            ],
            'text_final' => [
                'string',
                'max:60',
                'nullable',
            ],
            'valor_inicial' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'valor_final' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
