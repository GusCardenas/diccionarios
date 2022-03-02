<?php

namespace App\Http\Requests;

use App\Models\DictionariesValue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDictionariesValueRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dictionaries_value_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dictionaries_values,id',
        ];
    }
}
