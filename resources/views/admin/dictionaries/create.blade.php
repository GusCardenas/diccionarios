@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dictionary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dictionaries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="numero">{{ trans('cruds.dictionary.fields.numero') }}</label>
                <input class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" type="number" name="numero" id="numero" value="{{ old('numero', '') }}" step="1" required>
                @if($errors->has('numero'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dictionary.fields.numero_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.dictionary.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dictionary.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ruta">{{ trans('cruds.dictionary.fields.ruta') }}</label>
                <input class="form-control {{ $errors->has('ruta') ? 'is-invalid' : '' }}" type="text" name="ruta" id="ruta" value="{{ old('ruta', '') }}" required>
                @if($errors->has('ruta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ruta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dictionary.fields.ruta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notas">{{ trans('cruds.dictionary.fields.notas') }}</label>
                <input class="form-control {{ $errors->has('notas') ? 'is-invalid' : '' }}" type="text" name="notas" id="notas" value="{{ old('notas', '') }}">
                @if($errors->has('notas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dictionary.fields.notas_helper') }}</span>
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