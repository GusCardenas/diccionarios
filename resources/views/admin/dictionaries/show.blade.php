@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dictionary.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dictionaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dictionary.fields.id') }}
                        </th>
                        <td>
                            {{ $dictionary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dictionary.fields.numero') }}
                        </th>
                        <td>
                            {{ $dictionary->numero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dictionary.fields.nombre') }}
                        </th>
                        <td>
                            {{ $dictionary->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dictionary.fields.ruta') }}
                        </th>
                        <td>
                            {{ $dictionary->ruta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dictionary.fields.notas') }}
                        </th>
                        <td>
                            {{ $dictionary->notas }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dictionaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#diccionario_dictionaries_values" role="tab" data-toggle="tab">
                {{ trans('cruds.dictionariesValue.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="diccionario_dictionaries_values">
            @includeIf('admin.dictionaries.relationships.diccionarioDictionariesValues', ['dictionariesValues' => $dictionary->diccionarioDictionariesValues])
        </div>
    </div>
</div>

@endsection