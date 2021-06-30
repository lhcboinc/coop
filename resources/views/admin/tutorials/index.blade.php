@extends('layouts.admin')
@section('content')
@can('tutorial_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tutorials.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tutorial.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tutorial.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Tutorial">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tutorial.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorial.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorial.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorial.fields.url') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorial.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorial.fields.order') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorial.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorial.fields.author') }}
                        </th>
                        <th>
                            {{ trans('cruds.tutorial.fields.editor') }}
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Tutorial::CATEGORY_SELECT as $key => $item)
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Tutorial::STATUS_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
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
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($users as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tutorials as $key => $tutorial)
                        <tr data-entry-id="{{ $tutorial->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tutorial->id ?? '' }}
                            </td>
                            <td>
                                {{ $tutorial->title ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Tutorial::CATEGORY_SELECT[$tutorial->category] ?? '' }}
                            </td>
                            <td>
                                {{ $tutorial->url ?? '' }}
                            </td>
                            <td>
                                @if($tutorial->image)
                                    <a href="{{ $tutorial->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $tutorial->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $tutorial->order ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Tutorial::STATUS_SELECT[$tutorial->status] ?? '' }}
                            </td>
                            <td>
                                {{ $tutorial->author->name ?? '' }}
                            </td>
                            <td>
                                {{ $tutorial->editor->name ?? '' }}
                            </td>
                            <td>
                                @can('tutorial_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tutorials.show', $tutorial->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tutorial_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tutorials.edit', $tutorial->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tutorial_delete')
                                    <form action="{{ route('admin.tutorials.destroy', $tutorial->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tutorial_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tutorials.massDestroy') }}",
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
    order: [[ 6, 'asc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Tutorial:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
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