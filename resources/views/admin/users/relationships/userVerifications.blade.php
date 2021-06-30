@can('verification_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.verifications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.verification.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.verification.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userVerifications">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.verification.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.verification.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.verification.fields.doc') }}
                        </th>
                        <th>
                            {{ trans('cruds.verification.fields.doc_country') }}
                        </th>
                        <th>
                            {{ trans('cruds.verification.fields.firstname') }}
                        </th>
                        <th>
                            {{ trans('cruds.verification.fields.lastname') }}
                        </th>
                        <th>
                            {{ trans('cruds.verification.fields.lastdigits') }}
                        </th>
                        <th>
                            {{ trans('cruds.verification.fields.verified_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.verification.fields.editor') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($verifications as $key => $verification)
                        <tr data-entry-id="{{ $verification->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $verification->id ?? '' }}
                            </td>
                            <td>
                                {{ $verification->user->name ?? '' }}
                            </td>
                            <td>
                                @if($verification->doc)
                                    <a href="{{ $verification->doc->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $verification->doc->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $verification->doc_country ?? '' }}
                            </td>
                            <td>
                                {{ $verification->firstname ?? '' }}
                            </td>
                            <td>
                                {{ $verification->lastname ?? '' }}
                            </td>
                            <td>
                                {{ $verification->lastdigits ?? '' }}
                            </td>
                            <td>
                                {{ $verification->verified_by->name ?? '' }}
                            </td>
                            <td>
                                {{ $verification->editor->name ?? '' }}
                            </td>
                            <td>
                                @can('verification_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.verifications.show', $verification->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('verification_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.verifications.edit', $verification->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('verification_delete')
                                    <form action="{{ route('admin.verifications.destroy', $verification->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('verification_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.verifications.massDestroy') }}",
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
  let table = $('.datatable-userVerifications:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection