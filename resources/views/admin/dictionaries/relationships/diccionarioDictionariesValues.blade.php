@can('dictionaries_value_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.dictionaries-values.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dictionariesValue.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.dictionariesValue.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-diccionarioDictionariesValues">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.diccionario') }}
                        </th>
                        <th>
                            {{ trans('cruds.dictionary.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.texto_inicial') }}
                        </th>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.text_final') }}
                        </th>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.valor_inicial') }}
                        </th>
                        <th>
                            {{ trans('cruds.dictionariesValue.fields.valor_final') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dictionariesValues as $key => $dictionariesValue)
                        <tr data-entry-id="{{ $dictionariesValue->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dictionariesValue->id ?? '' }}
                            </td>
                            <td>
                                {{ $dictionariesValue->diccionario->numero ?? '' }}
                            </td>
                            <td>
                                {{ $dictionariesValue->diccionario->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $dictionariesValue->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $dictionariesValue->texto_inicial ?? '' }}
                            </td>
                            <td>
                                {{ $dictionariesValue->text_final ?? '' }}
                            </td>
                            <td>
                                {{ $dictionariesValue->valor_inicial ?? '' }}
                            </td>
                            <td>
                                {{ $dictionariesValue->valor_final ?? '' }}
                            </td>
                            <td>
                                @can('dictionaries_value_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.dictionaries-values.show', $dictionariesValue->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('dictionaries_value_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.dictionaries-values.edit', $dictionariesValue->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('dictionaries_value_delete')
                                    <form action="{{ route('admin.dictionaries-values.destroy', $dictionariesValue->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('dictionaries_value_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dictionaries-values.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-diccionarioDictionariesValues:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection