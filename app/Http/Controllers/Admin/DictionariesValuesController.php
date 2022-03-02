<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDictionariesValueRequest;
use App\Http\Requests\StoreDictionariesValueRequest;
use App\Http\Requests\UpdateDictionariesValueRequest;
use App\Models\DictionariesValue;
use App\Models\Dictionary;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DictionariesValuesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dictionaries_value_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dictionariesValues = DictionariesValue::with(['diccionario'])->get();

        return view('admin.dictionariesValues.index', compact('dictionariesValues'));
    }

    public function create()
    {
        abort_if(Gate::denies('dictionaries_value_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diccionarios = Dictionary::pluck('numero', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dictionariesValues.create', compact('diccionarios'));
    }

    public function store(StoreDictionariesValueRequest $request)
    {
        $dictionariesValue = DictionariesValue::create($request->all());

        return redirect()->route('admin.dictionaries-values.index');
    }

    public function edit(DictionariesValue $dictionariesValue)
    {
        abort_if(Gate::denies('dictionaries_value_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diccionarios = Dictionary::pluck('numero', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dictionariesValue->load('diccionario');

        return view('admin.dictionariesValues.edit', compact('diccionarios', 'dictionariesValue'));
    }

    public function update(UpdateDictionariesValueRequest $request, DictionariesValue $dictionariesValue)
    {
        $dictionariesValue->update($request->all());

        return redirect()->route('admin.dictionaries-values.index');
    }

    public function show(DictionariesValue $dictionariesValue)
    {
        abort_if(Gate::denies('dictionaries_value_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dictionariesValue->load('diccionario');

        return view('admin.dictionariesValues.show', compact('dictionariesValue'));
    }

    public function destroy(DictionariesValue $dictionariesValue)
    {
        abort_if(Gate::denies('dictionaries_value_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dictionariesValue->delete();

        return back();
    }

    public function massDestroy(MassDestroyDictionariesValueRequest $request)
    {
        DictionariesValue::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
