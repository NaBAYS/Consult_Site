@php
    $options = [
    ];
@endphp

@extends('admin.layouts.app', $options)

@section('content')
    <div class="row push-inner-50-t">
        <div class="col-md-4">
            @component('components.card', ['title' => 'Users'])
                <ul>
                    <li><a href="{{ route('admin.user.index') }}">View</a></li>
                    <li><a href="{{ route('admin.user.create') }}">New</a></li>
                </ul>
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('components.card', ['title' => 'File Uploads'])
                <ul>
                    <li><a href="{{ route('admin.file.index') }}">View</a></li>
                    <li><a href="{{ route('admin.file.create') }}">New</a></li>
                </ul>
            @endcomponent
        </div>
    </div>
@endsection