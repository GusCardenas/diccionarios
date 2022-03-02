<?php

namespace App\Http\Requests;

use App\Models\Dictionary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDictionaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dictionary_create');
    }

    public function rules()
    {
        return [
            'numero' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nombre' => [
                'string',
                'max:90',
                'required',
                'unique:dictionaries',
            ],
            'ruta' => [
                'string',
                'max:90',
                'required',
            ],
            'notas' => [
                'string',
                'max:200',
                'nullable',
            ],
        ];
    }
}
