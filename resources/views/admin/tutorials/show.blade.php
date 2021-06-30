@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tutorial.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tutorials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorial.fields.id') }}
                        </th>
                        <td>
                            {{ $tutorial->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorial.fields.title') }}
                        </th>
                        <td>
                            {{ $tutorial->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorial.fields.description') }}
                        </th>
                        <td>
                            {!! $tutorial->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorial.fields.category') }}
                        </th>
                        <td>
                            {{ App\Models\Tutorial::CATEGORY_SELECT[$tutorial->category] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorial.fields.url') }}
                        </th>
                        <td>
                            {{ $tutorial->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorial.fields.image') }}
                        </th>
                        <td>
                            @if($tutorial->image)
                                <a href="{{ $tutorial->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $tutorial->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorial.fields.order') }}
                        </th>
                        <td>
                            {{ $tutorial->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorial.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Tutorial::STATUS_SELECT[$tutorial->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorial.fields.author') }}
                        </th>
                        <td>
                            {{ $tutorial->author->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tutorial.fields.editor') }}
                        </th>
                        <td>
                            {{ $tutorial->editor->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tutorials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection