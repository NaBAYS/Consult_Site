<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

@isset($options)
    @if(array_has($options, 'select2'))
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />

        <style>
            .select2-container {
                width: 100% !important;
            }
        </style>
    @endif
@endisset

<link href="{{ asset('css/app.css') }}" rel="stylesheet">