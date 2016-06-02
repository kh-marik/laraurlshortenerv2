@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Users</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Users
                    </div>
                    <table class="table table-bordered table-dark">
                        <thead>
                        <tr>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Is admin?</td>
                            <td>Avatar</td>
                            <td>Created At</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr style="word-break: break-all;">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_admin == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ empty($user->avatar) ? 'No' : 'Yes' }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td><a href="{{ url("adminplace/users/$user->id/edit") }}" class="btn btn-default btn-xs">Edit</a></td>
                                <td><a href="{{ url("adminplace/users/$user->id/delete") }}" class="btn btn-default btn-xs">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection