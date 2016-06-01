@extends('layouts.user')

@section('content')
    <div class="jumbotron">
        <div class="panel panel-danger">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 lead">User profile
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img class="img-circle" src="
                                @if(Auth::user()->avatar)
                        {{ url('images/avatars/'.Auth::user()->avatar) }}
                        @else
                        {{ url('site/default_noavatar.jpg') }}
                        @endif
                                ">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="only-bottom-margin">{{ Auth::user()->name }}</h1>
                                <span class="text-muted">Email:</span> {{ Auth::user()->email }}<br>
                                <small class="text-muted">Created: {{ Auth::user()->created_at }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <a class="btn btn-default pull-right" href="/cabinet/profile/edit">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection