@extends('layouts.app')

@section('content')
    <div class="row push-inner-50-t">
        <div class="col-md-8 col-md-offset-2">
            @component('components.card', ['title' => 'Register'])
                {{ Form::open(['route' => 'register']) }}

                {{ Form::bsInput('first_name') }}

                {{ Form::bsInput('last_name') }}

                {{ Form::bsInput('email') }}

                {{ Form::bsInput('user_name') }}

                {{ Form::bsInput('password', null, ['password' => true, 'confirmation' => true]) }}

                {{ Form::submit('Register', ['class' => 'btn btn-primary']) }}

                {{ Form::close() }}
            @endcomponent
        </div>
    </div>
@endsection
