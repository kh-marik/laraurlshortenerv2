@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Advertisement</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                @if($adverts->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Views</td>
                            <td>Bought views</td>
                            <td>Active?</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($adverts as $advert)
                            <tr>
                                <td>{{ $advert->id }}</td>
                                <td>{{ $advert->title }}</td>
                                <td>{{ $advert->views_count }}</td>
                                <td>{{ $advert->bought_views_count }}</td>
                                <td>{{ $advert->active == 1 ? 'Yes'  :  'No' }}</td>
                                <td><a class="btn btn-info btn-xs" href="{{ url("adminplace/advert/$advert->id/edit") }}">Edit</a></td>
                                <td><a class="btn btn-danger btn-xs" href="{{ url("adminplace/advert/$advert->id/delete") }}">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div>There's no adverts, please add one</div>
                @endif
            </div>
        </div>
    </div>
@endsection