@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Links</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Links
                    </div>
                    <table class="table table-bordered table-dark">
                        <thead>
                        <tr>
                            <td>Id</td>
                            <td>RealUrl</td>
                            <td>ShortUrl</td>
                            <td>Views</td>
                            <td>Preview?</td>
                            <td>Advert?</td>
                            <td>Delete</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($links as $link)
                            <tr style="word-break: break-all;">
                                <td>{{ $link->id }}</td>
                                <td>{{ $link->realurl }}</td>
                                <td>{{ $link->shorturl }}</td>
                                <td>{{ $link->views_count }}</td>
                                <td>{{ $link->preview == 0 ? 'No' : 'Yes' }}</td>
                                <td>{{ $link->advertise == 0 ? 'No' : 'Yes' }}</td>
                                <td><a href="{{ url("adminplace/links/$link->id/delete") }}" class="btn btn-default btn-xs">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection