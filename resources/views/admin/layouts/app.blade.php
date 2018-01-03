<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @include('admin.partials.layouts.header-scripts')

</head>
<body class="@isset($bg_gradient_gray){{ 'background-gradient' }}@endisset">
<div id="app">
    @include('admin.partials.layouts.navigation')

    @if(session('message'))
        <div class="alert alert-{{ session('message')['status'] }}">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            {{ session('message')['message'] }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>

<!-- Scripts -->
@include('admin.partials.layouts.footer-scripts')

@stack('scripts')
</body>
</html>