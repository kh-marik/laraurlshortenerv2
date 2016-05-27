@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <form action="{{ url('/') }}" method="POST">
            {!! csrf_field() !!}
            <div class="input-group">
                <input type="text" name="realurl" class="form-control" placeholder="Enter url to short">
              <span class="input-group-btn">
                <button class="btn btn-danger" type="submit">Short It!</button>
              </span>
            </div>
        </form>
    </div>
@endsection
