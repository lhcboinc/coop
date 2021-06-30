@can('account_operation_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.account-operations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.accountOperation.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.accountOperation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userAccountOperations">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.accountOperation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.accountOperation.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.accountOperation.fields.operation') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accountOperations as $key => $accountOperation)
                        <tr data-entry-id="{{ $accountOperation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $accountOperation->id ?? '' }}
                            </td>
                            <td>
                                {{ $accountOperation->user->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\AccountOperation::OPERATION_SELECT[$accountOperation->operation] ?? '' }}
                            </td>
                            <td>
                                @can('account_operation_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.account-operations.show', $accountOperation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('account_operation_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.account-operations.edit', $accountOperation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('account_operation_delete')
                                    <form action="{{ route('admin.account-operations.destroy', $accountOperation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('account_operation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.account-operations.massDestroy') }}",
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
  let table = $('.datatable-userAccountOperations:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection