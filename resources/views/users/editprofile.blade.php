@extends('layouts.user')

@section('content')
    <div class="jumbotron">
        <form action="{{ url('cabinet/profile') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar">
            </div>
            <br>
            <hr>
            <div class="fa-border">
                <p>If you want to change password, enter new password and confirm it</p>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Update profile</button>
        </form>
    </div>
@endsection