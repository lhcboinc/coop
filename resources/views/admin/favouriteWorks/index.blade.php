@extends('layouts.admin')
@section('content')
@can('favourite_work_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.favourite-works.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.favouriteWork.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.favouriteWork.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-FavouriteWork">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.favouriteWork.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.favouriteWork.fields.author') }}
                        </th>
                        <th>
                            {{ trans('cruds.favouriteWork.fields.work') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($favouriteWorks as $key => $favouriteWork)
                        <tr data-entry-id="{{ $favouriteWork->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $favouriteWork->id ?? '' }}
                            </td>
                            <td>
                                {{ $favouriteWork->author->name ?? '' }}
                            </td>
                            <td>
                                {{ $favouriteWork->work->title ?? '' }}
                            </td>
                            <td>
                                @can('favourite_work_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.favourite-works.show', $favouriteWork->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('favourite_work_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.favourite-works.edit', $favouriteWork->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('favourite_work_delete')
                                    <form action="{{ route('admin.favourite-works.destroy', $favouriteWork->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('favourite_work_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.favourite-works.massDestroy') }}",
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
  let table = $('.datatable-FavouriteWork:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection