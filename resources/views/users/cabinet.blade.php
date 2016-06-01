@extends('layouts.user')

@section('content')
    <div class="jumbotron">
        <div class="span1"><h2>{{ Auth::user()->name }}</h2></div>
        <hr>
        <div class="container" style="font-size: 90%;">
            <div class="row">
                <div class="center-block">
                    <img class="thumbnail center-block" src="
                    @if(Auth::user()->avatar)
                    {{ url('images/avatars/'.Auth::user()->avatar) }}
                    @else
                    {{ url('images/avatars/noavatar.gif') }}
                    @endif
                            ">
                </div>
                <div>
                    <a class="btn btn-info" href="{{ url('cabinet/mylinks') }}">Links <span class="badge">{{ count(Auth::user()->links) }}</span></a>
                </div>
            </div>
        </div>
    </div>
@endsection
