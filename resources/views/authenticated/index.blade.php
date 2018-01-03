@php
    $options = [
        'parallax' => true
    ];
@endphp

@extends('layouts.app', $options)

@section('content')
    <div class="jumbotron text-center push-inner-100-t push-inner-100 background-primary" style="margin-bottom: 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h1 font-light font-white">
                        <span class="material-icons">search</span>
                        search for resources
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="push-inner-50-t push-inner-50">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    @component('components.card', ['class' => 'push-overlap push-30 rounded-corners'])
                        Search box
                    @endcomponent

                    <div class="row">
                        @foreach($files as $file)
                            <div class="col-md-6">
                                @php
                                    // Card settings
                                    $card_settings = [
                                        //
                                    ];
                                @endphp

                                @component('components.card', $card_settings)
                                    <dl class="push-0">
                                        <dt><strong>{{ $file->name }}</strong></dt>
                                        <dd>{{ $file->description }}</dd>
                                    </dl>
                                @endcomponent
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection