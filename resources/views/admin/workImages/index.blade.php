@extends('layouts.admin')
@section('content')
@can('work_image_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.work-images.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.workImage.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.workImage.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-WorkImage">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.workImage.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.workImage.fields.work') }}
                        </th>
                        <th>
                            {{ trans('cruds.workImage.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.workImage.fields.reported') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workImages as $key => $workImage)
                        <tr data-entry-id="{{ $workImage->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $workImage->id ?? '' }}
                            </td>
                            <td>
                                {{ $workImage->work->title ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\WorkImage::STATUS_SELECT[$workImage->status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\WorkImage::REPORTED_SELECT[$workImage->reported] ?? '' }}
                            </td>
                            <td>
                                @can('work_image_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.work-images.show', $workImage->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('work_image_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.work-images.edit', $workImage->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('work_image_delete')
                                    <form action="{{ route('admin.work-images.destroy', $workImage->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('work_image_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.work-images.massDestroy') }}",
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
  let table = $('.datatable-WorkImage:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection