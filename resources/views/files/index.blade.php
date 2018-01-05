@php
    $options = [
        'parallax' => true,
        'select2' => true
    ];
@endphp

@extends('layouts.app', $options)

@section('full-width')
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
@endsection

@section('content')
    <div class="push-inner-50-t push-inner-50">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @component('components.card', ['class' => 'push-overlap push-30 rounded-corners'])
                    @php
                        $collapse_classes = ['collapse', 'push-30-t'];
                        $collapse_arrow = 'false';

                        if (Form::getValueAttribute('tags') || Form::getValueAttribute('categories')) {
                            $collapse_classes[] = 'in';
                            $collapse_arrow = 'true';
                        }

                        $collapse_classes = implode(' ', $collapse_classes);
                    @endphp

                    {{ Form::open(['route' => ['file.search'], 'method' => 'GET']) }}
                    <fieldset>
                        <legend class="sr-only">Search</legend>

                        {{ Form::bsInput('text_search', null, ['placeholder' => 'Search']) }}

                        <div class="clearfix">
                            {{ Form::submit('search', ['class' => 'btn btn-primary pull-left']) }}

                            <button type="button" class="btn btn-link pull-right" data-toggle="collapse"
                                    data-target="#collapseOptions" aria-expanded="{{ $collapse_arrow }}"
                                    aria-controls="collapseOptions">
                                More Options
                                <span class="material-icons">keyboard_arrow_down</span>
                            </button>
                        </div>
                    </fieldset>

                    <div class="collapse-wrapper">
                        <div class="{{ $collapse_classes }}" id="collapseOptions">
                            <fieldset>
                                <legend class="sr-only">Search Options</legend>

                                <div class="row">
                                    <div class="col-md-4">
                                        {{ Form::bsSelect('tags', \App\FileTag::all()->pluck('description', 'id')->toArray(), null, ['multi' => true, 'placeholder' => 'Tags']) }}
                                    </div>
                                    <div class="col-md-4">
                                        {{ Form::bsSelect('categories', \App\FileCategory::all()->pluck('long_name', 'id')->toArray()) }}
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    {{ Form::close() }}
                @endcomponent

                @if(count($files) > 0)
                    @foreach($files as $file)
                        @if($loop->iteration % 2 !== 0)
                            <div class="row">
                                @endif

                                <div class="col-md-6">
                                    @php
                                        // Card settings
                                        $card_settings = [
                                            'link' => route('file.show', $file->id)
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
                @else
                    <div class="alert alert-info">
                        No Results Found
                    </div>
                @endif

                {{ $files->links() }}
            </div>
        </div>
    </div>
@endsection