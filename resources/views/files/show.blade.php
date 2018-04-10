@php
    $options = [
        'moment' => true
    ];
@endphp

@extends('layouts.app', $options)

@section('full-width')
    <div class="jumbotron push-inner-100-t push-inner-100 push-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h2 push-15">{{ $file->name }}</h2>
                    <h3 class="h4 push-0">{{ $file->category->long_name }}</h3>
                    @if($file->tags()->count() > 0)
                        <div>
                            @foreach($file->tags as $tag)
                                <span class="label label-default">{{ $tag->description }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @php
        $file_exists = Storage::disk($file->location)->exists($file->file_path);
    @endphp

    <div class="row push-inner-50-t push-30">
        <div class="col-md-10 col-md-offset-1">
            @component('components.card', ['class' => 'push-overlap'])
                <p class="push-30">{{ $file->description }}</p>

                @if($file_exists)
                    <a href="{{ route('file.download', $file->id) }}" class="btn btn-primary push-15">Download File</a>
                @else
                    <button type="button" disabled class="btn btn-primary push-15">File Temporarily Unavailable</button>
                @endif

                <div>{{ $file->download_count }} Download(s)</div>
            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3 class="h4">Comments</h3>

            <div id="vue-app">
                <file-comments></file-comments>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/vue/file-comments.js') }}"></script>

    <script>
        const store = new Vuex.Store({
            state: {
                comments: window.comments,
                file: window.file,
                userId: window.userId
            },
            mutations: {
                update (state, payload) {
                    state[payload.name].push(payload.data);
                }
            }
        });

        const app = new Vue({
            el: '#vue-app',
            store,
        })
    </script>
@endpush