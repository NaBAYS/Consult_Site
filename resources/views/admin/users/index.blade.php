@php
    $options = [
        //
    ];
@endphp

@extends('admin.layouts.app', $options)

@section('content')
    <div class="row push-30 push-inner-50-t">
        <div class="col-md-12">
            <h1 class="h2">User Index</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @component('components.card')
                @if(count($users) > 0)
                    @component('admin.partials.index-table')
                        @slot('head')
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Username</th>
                            </tr>
                        @endslot

                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->user_name }}</td>
                            </tr>
                        @endforeach
                    @endcomponent

                    {{ $users->links() }}
                @else
                    <div class="alert alert-info">No results to show</div>
                @endif
            @endcomponent
        </div>
    </div>
@endsection