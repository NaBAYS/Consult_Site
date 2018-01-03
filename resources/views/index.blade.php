@php
    $options = [
        'parallax' => true
    ];
@endphp

@extends('layouts.app', $options)

@section('content')
    <div class="jumbotron text-center push-inner-100-t push-inner-100" style="margin-bottom: 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h1 font-light font-gray-dark">
                        @if(Auth::check())
                            you are logged in
                            @else
                            consult lorem ipsum
                        @endif
                    </h2>
                    <h3 class="h4 push-30 font-gray-dark">lorem ipsum dolor sit amet. blah blah blah blah.</h3>
                    <a href="#" class="btn btn-primary">Text Button</a>
                </div>
            </div>
        </div>
    </div>

    <div class="background-white push-inner-50-t push-inner-50">
        <div class="container">
            <div class="row">
                <!--Column 1-->
                <div class="col-md-4 text-center">
                    <img src="http://via.placeholder.com/1080x768" alt="placeholder" class="img-responsive">
                    <h3 class="h3 font-bold push-15">Lorem Ipsum Dolor Sit</h3>
                    <p class="line-height-wide">
                        Ubi est bassus adelphis? Altus dominas ducunt ad solitudo. Agripetas congregabo in cella!
                        Elogium
                        crederes, tanquam fidelis acipenser.
                    </p>
                    <a href="#" class="btn btn-link font-large">
                        Button
                        <span class="material-icons">keyboard_arrow_right</span>
                    </a>
                </div>
                <!--Column 2-->
                <div class="col-md-4 text-center">
                    <img src="http://via.placeholder.com/1080x768" alt="placeholder" class="img-responsive">
                    <h3 class="h3 font-bold push-15">Lorem Ipsum Dolor Sit</h3>
                    <p class="line-height-wide">
                        Ubi est bassus adelphis? Altus dominas ducunt ad solitudo. Agripetas congregabo in cella!
                        Elogium
                        crederes, tanquam fidelis acipenser.
                    </p>
                    <a href="#" class="btn btn-link font-large">
                        Button
                        <span class="material-icons">keyboard_arrow_right</span>
                    </a>
                </div>
                <!--Column 3-->
                <div class="col-md-4 text-center">
                    <img src="http://via.placeholder.com/1080x768" alt="placeholder" class="img-responsive">
                    <h3 class="h3 font-bold push-15">Lorem Ipsum Dolor Sit</h3>
                    <p class="line-height-wide">
                        Ubi est bassus adelphis? Altus dominas ducunt ad solitudo. Agripetas congregabo in cella!
                        Elogium
                        crederes, tanquam fidelis acipenser.
                    </p>
                    <a href="#" class="btn btn-link font-large">
                        Button
                        <span class="material-icons">keyboard_arrow_right</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="background-primary">
        <div class="container">
            <div class="row push-inner-50 push-inner-50-t">
                <div class="col-md-4">
                    <img src="http://via.placeholder.com/1080x768" alt="placeholder" class="img-responsive">
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <h2 class="h1 font-white font-bold push-30">Lorem Ipsum Dolor Sit Amet</h2>
                    <p class="font-white line-height-wide">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection