@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.dictionariesValue.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dictionaries-values.update", [$dictionariesValue->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="diccionario_id">{{ trans('cruds.dictionariesValue.fields.diccionario') }}</label>
                <select class="form-control select2 {{ $errors->has('diccionario') ? 'is-invalid' : '' }}" name="diccionario_id" id="diccionario_id" required>
                    @foreach($diccionarios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('diccionario_id') ? old('diccionario_id') : $dictionariesValue->diccionario->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('diccionario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('diccionario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dictionariesValue.fields.diccionario_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.dictionariesValue.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $dictionariesValue->nombre) }}" required>
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dictionariesValue.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="texto_inicial">{{ trans('cruds.dictionariesValue.fields.texto_inicial') }}</label>
                <input class="form-control {{ $errors->has('texto_inicial') ? 'is-invalid' : '' }}" type="text" name="texto_inicial" id="texto_inicial" value="{{ old('texto_inicial', $dictionariesValue->texto_inicial) }}">
                @if($errors->has('texto_inicial'))
                    <div class="invalid-feedback">
                        {{ $errors->first('texto_inicial') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dictionariesValue.fields.texto_inicial_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="text_final">{{ trans('cruds.dictionariesValue.fields.text_final') }}</label>
                <input class="form-control {{ $errors->has('text_final') ? 'is-invalid' : '' }}" type="text" name="text_final" id="text_final" value="{{ old('text_final', $dictionariesValue->text_final) }}">
                @if($errors->has('text_final'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text_final') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dictionariesValue.fields.text_final_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="valor_inicial">{{ trans('cruds.dictionariesValue.fields.valor_inicial') }}</label>
                <input class="form-control {{ $errors->has('valor_inicial') ? 'is-invalid' : '' }}" type="number" name="valor_inicial" id="valor_inicial" value="{{ old('valor_inicial', $dictionariesValue->valor_inicial) }}" step="1">
                @if($errors->has('valor_inicial'))
                    <div class="invalid-feedback">
                        {{ $errors->first('valor_inicial') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dictionariesValue.fields.valor_inicial_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="valor_final">{{ trans('cruds.dictionariesValue.fields.valor_final') }}</label>
                <input class="form-control {{ $errors->has('valor_final') ? 'is-invalid' : '' }}" type="number" name="valor_final" id="valor_final" value="{{ old('valor_final', $dictionariesValue->valor_final) }}" step="1">
                @if($errors->has('valor_final'))
                    <div class="invalid-feedback">
                        {{ $errors->first('valor_final') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dictionariesValue.fields.valor_final_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection