@php
    $options = [
        'parallax' => true,
        'select2' => true
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
                        {{ Form::open(['route' => ['dashboard.search'], 'method' => 'GET']) }}
                        <fieldset>
                            <legend class="sr-only">Search</legend>

                            {{ Form::bsInput('text_search', null, ['placeholder' => 'Search']) }}

                            <div class="clearfix">
                                {{ Form::submit('search', ['class' => 'btn btn-primary pull-left']) }}

                                <button type="button" class="btn btn-link pull-right" data-toggle="collapse"
                                        data-target="#collapseOptions" aria-expanded="false"
                                        aria-controls="collapseOptions">
                                    More Options
                                    <span class="material-icons">keyboard_arrow_down</span>
                                </button>
                            </div>
                        </fieldset>

                        <div class="collapse-wrapper">
                            <div class="collapse push-30-t" id="collapseOptions">
                                <fieldset>
                                    <legend class="sr-only">Search Options</legend>

                                    {{ Form::bsSelect('categories', \App\FileCategory::all()->pluck('long_name', 'id')->toArray()) }}

                                    {{ Form::bsSelect('tags', \App\FileTag::all()->pluck('description', 'id')->toArray(), null, ['multi' => true]) }}
                                </fieldset>
                            </div>
                        </div>
                        {{ Form::close() }}
                    @endcomponent

                    @foreach($files as $file)
                        @if($loop->iteration % 2 !== 0)
                            <div class="row">
                                @endif

                                <div class="col-md-6">
                                    @php
                                        // Card settings
                                        $card_settings = [
                                            //
                                        ];
                                    @endphp

                                    @component('components.card', $card_settings)
                                        <dl class="push-15">
                                            <dt><strong>{{ $file->name }}</strong></dt>
                                            <dd>{{ $file->description }}</dd>
                                        </dl>

                                        <div class="clearfix">
                                            <span class="label label-info pull-left">{{ $file->category->long_name }}</span>
                                            @if($file->tags()->count() > 0)
                                                <div class="pull-right">
                                                    @foreach($file->tags as $tag)
                                                        <span class="badge">{{ $tag->description }}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endcomponent
                                </div>

                                @if($loop->iteration % 2 === 0 || $loop->last)
                            </div>
                        @endif
                    @endforeach

                    {{ $files->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection