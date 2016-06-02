@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Edit user profile</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-push-1 col-md-9">
                <form action="{{ url("adminplace/users/$user->id") }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label for="is_admin">
                                <input type="checkbox" name="is_admin" @if($user->is_admin == 1) {{'checked' }} @endif>Is Admin?</label>
                        </div>
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
        </div>
    </div>
@endsection