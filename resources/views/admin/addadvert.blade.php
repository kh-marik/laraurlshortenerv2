@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Advertisement</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <form action="{{ url('adminplace/advert/new') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="bought_views_count">Bought views</label>
                        <input type="text" class="form-control" name="bought_views_count" value="{{ old('bought_views_count') }}">
                    </div>
                    <div class="form-group">
                        <label for="banner">Banner (728x90px)</label>
                        <input type="file" name="banner">
                    </div>
                    <div class="form-group">
                        <label for="active">Active?</label>
                        <input type="checkbox" name="active">
                    </div>
                    <button type="submit" class="btn btn-success">Save Advert</button>
                </form>
            </div>
        </div>
    </div>
@endsection