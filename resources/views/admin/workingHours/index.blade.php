@extends('layouts.admin')
@section('content')
@can('working_hour_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.working-hours.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.workingHour.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.workingHour.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-WorkingHour">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.workingHour.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.workingHour.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.workingHour.fields.weekday') }}
                        </th>
                        <th>
                            {{ trans('cruds.workingHour.fields.from') }}
                        </th>
                        <th>
                            {{ trans('cruds.workingHour.fields.till') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workingHours as $key => $workingHour)
                        <tr data-entry-id="{{ $workingHour->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $workingHour->id ?? '' }}
                            </td>
                            <td>
                                {{ $workingHour->user->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\WorkingHour::WEEKDAY_SELECT[$workingHour->weekday] ?? '' }}
                            </td>
                            <td>
                                {{ $workingHour->from ?? '' }}
                            </td>
                            <td>
                                {{ $workingHour->till ?? '' }}
                            </td>
                            <td>
                                @can('working_hour_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.working-hours.show', $workingHour->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('working_hour_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.working-hours.edit', $workingHour->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('working_hour_delete')
                                    <form action="{{ route('admin.working-hours.destroy', $workingHour->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('working_hour_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.working-hours.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-WorkingHour:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('div#sidebar').on('transitionend', function(e) {
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
  })
  
})

</script>
@endsection