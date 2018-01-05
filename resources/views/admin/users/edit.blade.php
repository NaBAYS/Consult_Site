@php
    $options = [
        'select2' => true
    ];
@endphp

@extends('admin.layouts.app', $options)

@section('content')
    {{ Form::model($user, ['route' => ['admin.user.update', $user->id]]) }}

    {{ method_field('PUT') }}

    <div class="push-inner-50-t">
        @include('admin.partials.admin-title', ['title' => 'Edit User', 'btn' => 'Update'])
        @include('admin.partials.forms.user-inputs')
    </div>

    {{ Form::close() }}
@endsection