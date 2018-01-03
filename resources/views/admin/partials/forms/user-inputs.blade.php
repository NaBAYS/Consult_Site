<div class="row">
    <div class="col-md-6">
        @component('components.card', ['title' => 'User Basics'])
            {{ Form::bsInput('first_name') }}

            {{ Form::bsInput('last_name') }}

            {{ Form::bsInput('email') }}
        @endcomponent
    </div>

    <div class="col-md-6">
        @component('components.card', ['title' => 'User Account Details'])
            {{ Form::bsInput('user_name') }}

            {{ Form::bsSelect('role_id', \App\Role::all()->pluck('long_name', 'id')->toArray(), null, ['placeholder' => 'Role']) }}
        @endcomponent
    </div>
</div>