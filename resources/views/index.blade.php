@extends('layouts.app')

@section('content')
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
@endsection