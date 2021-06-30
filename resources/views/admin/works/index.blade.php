@extends('layouts.admin')
@section('content')
@can('work_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.works.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.work.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.work.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Work">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.work.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.gps_lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.gps_long') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.gps_approx') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.payment_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.payment_rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.transportation') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.catering') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.country') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.county') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.zip') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.client') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.client_ip') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.impressions') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.views') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.endorsed') }}
                        </th>
                        <th>
                            {{ trans('cruds.work.fields.reported') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Work::GPS_APPROX_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Work::PAYMENT_TYPE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($users as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Work::STATUS_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Work::ENDORSED_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Work::REPORTED_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($works as $key => $work)
                        <tr data-entry-id="{{ $work->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $work->id ?? '' }}
                            </td>
                            <td>
                                {{ $work->title ?? '' }}
                            </td>
                            <td>
                                {{ $work->description ?? '' }}
                            </td>
                            <td>
                                {{ $work->gps_lat ?? '' }}
                            </td>
                            <td>
                                {{ $work->gps_long ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Work::GPS_APPROX_SELECT[$work->gps_approx] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Work::PAYMENT_TYPE_SELECT[$work->payment_type] ?? '' }}
                            </td>
                            <td>
                                {{ $work->payment_rate ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $work->transportation ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $work->transportation ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $work->catering ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $work->catering ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $work->country ?? '' }}
                            </td>
                            <td>
                                {{ $work->county ?? '' }}
                            </td>
                            <td>
                                {{ $work->city ?? '' }}
                            </td>
                            <td>
                                {{ $work->address ?? '' }}
                            </td>
                            <td>
                                {{ $work->zip ?? '' }}
                            </td>
                            <td>
                                {{ $work->client->name ?? '' }}
                            </td>
                            <td>
                                {{ $work->client_ip ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Work::STATUS_SELECT[$work->status] ?? '' }}
                            </td>
                            <td>
                                {{ $work->impressions ?? '' }}
                            </td>
                            <td>
                                {{ $work->views ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Work::ENDORSED_SELECT[$work->endorsed] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Work::REPORTED_SELECT[$work->reported] ?? '' }}
                            </td>
                            <td>
                                @can('work_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.works.show', $work->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('work_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.works.edit', $work->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('work_delete')
                                    <form action="{{ route('admin.works.destroy', $work->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('work_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.works.massDestroy') }}",
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
  let table = $('.datatable-Work:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('div#sidebar').on('transitionend', function(e) {
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
  })
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection