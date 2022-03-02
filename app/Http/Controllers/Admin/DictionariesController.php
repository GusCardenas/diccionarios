<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDictionaryRequest;
use App\Http\Requests\StoreDictionaryRequest;
use App\Http\Requests\UpdateDictionaryRequest;
use App\Models\Dictionary;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DictionariesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dictionary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dictionaries = Dictionary::all();

        return view('admin.dictionaries.index', compact('dictionaries'));
    }

    public function create()
    {
        abort_if(Gate::denies('dictionary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dictionaries.create');
    }

    public function store(StoreDictionaryRequest $request)
    {
        $dictionary = Dictionary::create($request->all());

        return redirect()->route('admin.dictionaries.index');
    }

    public function edit(Dictionary $dictionary)
    {
        abort_if(Gate::denies('dictionary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dictionaries.edit', compact('dictionary'));
    }

    public function update(UpdateDictionaryRequest $request, Dictionary $dictionary)
    {
        $dictionary->update($request->all());

        return redirect()->route('admin.dictionaries.index');
    }

    public function show(Dictionary $dictionary)
    {
        abort_if(Gate::denies('dictionary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dictionary->load('diccionarioDictionariesValues');

        return view('admin.dictionaries.show', compact('dictionary'));
    }

    public function destroy(Dictionary $dictionary)
    {
        abort_if(Gate::denies('dictionary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dictionary->delete();

        return back();
    }

    public function massDestroy(MassDestroyDictionaryRequest $request)
    {
        Dictionary::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
