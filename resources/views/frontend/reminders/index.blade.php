@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('reminder_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.reminders.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.reminder.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.reminder.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Reminder">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reminder.fields.event') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reminder.fields.date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reminder.fields.time') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reminder.fields.saved') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reminder.fields.task') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reminders as $key => $reminder)
                                    <tr data-entry-id="{{ $reminder->id }}">
                                        <td>
                                            {{ $reminder->event ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reminder->date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reminder->time ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $reminder->saved ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $reminder->saved ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $reminder->task->unique_code ?? '' }}
                                        </td>
                                        <td>
                                            @can('reminder_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.reminders.show', $reminder->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('reminder_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.reminders.edit', $reminder->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('reminder_delete')
                                                <form action="{{ route('frontend.reminders.destroy', $reminder->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('reminder_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.reminders.massDestroy') }}",
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
  let table = $('.datatable-Reminder:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection