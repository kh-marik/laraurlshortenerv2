<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('urlshortener.title') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>
<body>
    <div class="nav-side-menu">
        <a href="/" class="brand">UrlShortener</a>
        <a class="brand" href="/cabinet/profile"><i class="fa fa-user fa-lg"> Profile</i></a>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list">
            <ul>
                <li>
                    <a href="/adminplace"><i class="fa fa-dashboard fa-lg"></i> Dashboard</a>
                </li>
                <li>
                    <a href="/adminplace/users"><i class="fa fa-users fa-lg"></i> Users</a>
                </li>
                <li>
                    <a href="/adminplace/links"><i class="fa fa-link fa-lg"></i> Links</a>
                </li>
                <li>
                    <a href="/adminplace/advert"><i class="fa fa-industry fa-lg"></i> Advertisement</a>
                </li>
                {{--<li data-toggle="collapse" data-target="#new" class="collapsed">--}}
                    {{--<a href="#"><i class="fa fa-plus-circle fa-lg"></i> New <span class="arrow"></span></a>--}}
                {{--</li>--}}
                {{--<ul class="sub-menu collapse" id="new">--}}
                    {{--<li>New New 1</li>--}}
                    {{--<li>New New 2</li>--}}
                    {{--<li>New New 3</li>--}}
                {{--</ul>--}}
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="center-top-block">
            <div class="brand">
                <div class="messages">
                    @include('common.flash_messages')
                    @include('common.form_errors')
                </div>
            </div>
        </div>
        @yield('content')
    </div><!-- /.container -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
