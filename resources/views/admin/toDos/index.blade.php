@extends('layouts.admin')
@section('content')
@can('to_do_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.to-dos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.toDo.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.toDo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ToDo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.toDo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.toDo.fields.item') }}
                        </th>
                        <th>
                            {{ trans('cruds.toDo.fields.due_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.toDo.fields.completed') }}
                        </th>
                        <th>
                            {{ trans('cruds.toDo.fields.saved') }}
                        </th>
                        <th>
                            {{ trans('cruds.toDo.fields.task') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($toDos as $key => $toDo)
                        <tr data-entry-id="{{ $toDo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $toDo->id ?? '' }}
                            </td>
                            <td>
                                {{ $toDo->item ?? '' }}
                            </td>
                            <td>
                                {{ $toDo->due_date ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $toDo->completed ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $toDo->completed ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $toDo->saved ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $toDo->saved ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $toDo->task->unique_code ?? '' }}
                            </td>
                            <td>
                                @can('to_do_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.to-dos.show', $toDo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('to_do_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.to-dos.edit', $toDo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('to_do_delete')
                                    <form action="{{ route('admin.to-dos.destroy', $toDo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('to_do_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.to-dos.massDestroy') }}",
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
  let table = $('.datatable-ToDo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection