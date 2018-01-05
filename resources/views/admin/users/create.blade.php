@php
    $options = [
        'select2' => true
    ];
@endphp

@extends('admin.layouts.app', $options)

@section('content')
    {{ Form::open(['route' => 'admin.user.store', 'files' => true]) }}

    <div class="push-inner-50-t">
        @include('admin.partials.admin-title', ['title' => 'Create User'])
        @include('admin.partials.forms.user-inputs')
    </div>

    {{ Form::close() }}
@endsection

@push('scripts')

@endpush