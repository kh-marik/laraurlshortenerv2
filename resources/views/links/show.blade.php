@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="show_url">
            <div class="show_url_urls">Requested url:</div>
            <a href="{{ $link->realurl }}">{{ $link->realurl }}</a>
            <div class="show_url_urls">Short url:</div>
            <a href="{{ url('/'.$link->shorturl) }}">{{ url('/'.$link->shorturl) }}</a>
            <div class="show_url_redirect">You will be redirected to
                <span><a href="{{ $link->realurl }}">{{ $link->realurl }}</a></span> in 10 seconds... (Off for testing...)
            </div>
        </div>
    </div>
@endsection