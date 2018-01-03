@php
    $options = [
        'select2' => true
    ];
@endphp

@extends('admin.layouts.app', $options)

@section('content')
    {{ Form::open(['route' => 'admin.file.store', 'files' => true]) }}

    <div class="container push-inner-50-t">
        @include('admin.partials.admin-title', ['title' => 'Create File Upload'])

        @include('admin.partials.forms.file-inputs')
    </div>

    {{ Form::close() }}
@endsection

@push('scripts')

@endpush