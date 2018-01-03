@php
    $options = [
        'select2' => true
    ];
@endphp

@extends('admin.layouts.app', $options)

@section('content')
    {{ Form::model($file, ['route' => ['admin.file.update', $file->id], 'files' => true]) }}

    {{ method_field('PUT') }}

    <div class="container push-inner-50-t">
        @include('admin.partials.admin-title', ['title' => 'Edit File Upload', 'btn' => 'Update'])
        @include('admin.partials.forms.file-inputs')
    </div>

    {{ Form::close() }}
@endsection