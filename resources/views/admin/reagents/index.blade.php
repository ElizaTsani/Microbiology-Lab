@extends('layouts.admin')
@section('content')
@can('reagent_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.reagents.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.reagent.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.reagent.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Reagent">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.reagent.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.reagent.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.reagent.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.reagent.fields.available_stock') }}
                        </th>
                        <th>
                            {{ trans('cruds.reagent.fields.minimum_reserve') }}
                        </th>
                        <th>
                            {{ trans('cruds.reagent.fields.alert') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reagents as $key => $reagent)
                        <tr data-entry-id="{{ $reagent->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $reagent->id ?? '' }}
                            </td>
                            <td>
                                {{ $reagent->name ?? '' }}
                            </td>
                            <td>
                                {{ $reagent->code ?? '' }}
                            </td>
                            <td>
                                {{ $reagent->available_stock ?? '' }}
                            </td>
                            <td>
                                {{ $reagent->minimum_reserve ?? '' }}
                            </td>
                            <td>
                                @if($reagent->available_stock < $reagent->minimum_reserve)
                                <div class="alert alert-danger">
                                    Make Order to request it.
                                </div>
                                @endif
                            </td>
                            <td>
                                @can('reagent_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.reagents.show', $reagent->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('reagent_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.reagents.edit', $reagent->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('reagent_delete')
                                    <form action="{{ route('admin.reagents.destroy', $reagent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('reagent_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.reagents.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-Reagent:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection