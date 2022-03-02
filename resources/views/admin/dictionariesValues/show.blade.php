@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dictionariesValue.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dictionaries-values.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.id') }}
                        </th>
                        <td>
                            {{ $dictionariesValue->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.diccionario') }}
                        </th>
                        <td>
                            {{ $dictionariesValue->diccionario->numero ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.nombre') }}
                        </th>
                        <td>
                            {{ $dictionariesValue->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.texto_inicial') }}
                        </th>
                        <td>
                            {{ $dictionariesValue->texto_inicial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.text_final') }}
                        </th>
                        <td>
                            {{ $dictionariesValue->text_final }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.valor_inicial') }}
                        </th>
                        <td>
                            {{ $dictionariesValue->valor_inicial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.valor_final') }}
                        </th>
                        <td>
                            {{ $dictionariesValue->valor_final }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dictionaries-values.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection