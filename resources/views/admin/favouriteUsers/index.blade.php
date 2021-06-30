@extends('layouts.admin')
@section('content')
@can('favourite_user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.favourite-users.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.favouriteUser.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.favouriteUser.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-FavouriteUser">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.favouriteUser.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.favouriteUser.fields.author') }}
                        </th>
                        <th>
                            {{ trans('cruds.favouriteUser.fields.user') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($favouriteUsers as $key => $favouriteUser)
                        <tr data-entry-id="{{ $favouriteUser->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $favouriteUser->id ?? '' }}
                            </td>
                            <td>
                                {{ $favouriteUser->author->name ?? '' }}
                            </td>
                            <td>
                                {{ $favouriteUser->user->name ?? '' }}
                            </td>
                            <td>
                                @can('favourite_user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.favourite-users.show', $favouriteUser->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('favourite_user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.favourite-users.edit', $favouriteUser->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('favourite_user_delete')
                                    <form action="{{ route('admin.favourite-users.destroy', $favouriteUser->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('favourite_user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.favourite-users.massDestroy') }}",
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
  let table = $('.datatable-FavouriteUser:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection