@php
    $options = [
        //
    ];
@endphp

@extends('admin.layouts.app', $options)

@section('content')
    <div class="row push-30 push-inner-50-t">
        <div class="col-md-12">
            <h1 class="h2">Files Index</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @component('components.card')
                @if(count($files) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>File Type</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <td><a href="{{ route('admin.file.edit', $file->id) }}"
                                           class="btn btn-primary">Edit</a></td>
                                    <td>{{ $file->id }}</td>
                                    <td>{{ $file->name }}</td>
                                    <td>{{ $categories[$file->file_category_id] }}</td>
                                    <td>{{ $file->file_type }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info">No results to show</div>
                @endif
            @endcomponent
        </div>
    </div>
@endsection