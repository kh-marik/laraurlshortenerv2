<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('urlshortener.title') }}</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>
    <body style="overflow: hidden;">
        <nav class="navbar navbar-fixed-top" style="background: #262626;opacity: 0.8;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">{{ config('urlshortener.title') }}</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('about') }}">About</a></li>
                        <li><a href="{{ url('contacts') }}">Contact</a>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Welcome, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    {{--@if(Auth::user()->is_admin)--}}
                                    {{--<li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-paw"></i> Admin</a></li>--}}
                                    {{--@endif--}}
                                    <li><a href="{{ url('/mylinks') }}"><i class="fa fa-btn fa-link"></i> My Links</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><a href="{{ url('register') }}">Register</a></li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">

            <div class="template">
                <div class="messages">
                    @include('common.flash_messages')
                    @include('common.form_errors')
                </div>
                <div class="jumbotron jumbotron-margin-25">
                    <form action="{{ url('/') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="input-group">
                            <input type="text" name="realurl" class="form-control" placeholder="Enter url to short" value="{{ old('realurl') }}">
              <span class="input-group-btn">
                <button class="btn btn-danger" type="submit">Short It!</button>
              </span>
                        </div>
                        @if(Auth::check())
                            <div class="input-group input-lg">
                                <span class="input-group-addon" id="basic-addon3">Enter your own url (only 7 symbols long but not required) <strong>{{ config('app.url') }}/</strong></span>
                                <input type="text" name="shorturl" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="mYuRl">
                            </div>
                        @endif
                    </form>
                </div>
            </div>

        </div><!-- /.container -->

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
    </html>
