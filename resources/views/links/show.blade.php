@extends('layouts.app')

@section('content')
    @if($link->advertise == '1')
        <div class="row" style="margin-top: 8%">
            <div class="col-mg-12">
                <img src="
            @if(!empty($advert->banner))
                {{ url("images/banners/$advert->banner") }}
                @else
                {{ url('/site/default_banner_728x90.png') }}
                @endif
                        " alt="Banner 728x90">
            </div>
        </div>
    @endif
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