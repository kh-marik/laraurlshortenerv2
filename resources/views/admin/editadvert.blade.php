@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Edit Advert</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <form action="{{ url("adminplace/advert/$advert->id ") }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $advert->title }}">
                    </div>
                    <div class="form-group">
                        <label for="bought_views_count">Bought views</label>
                        <input type="text" class="form-control" name="bought_views_count" value="{{ $advert->bought_views_count }}">
                    </div>
                    <div class="form-group">
                        <div><img src="{{ url('images/banners/' . $advert->banner) }}" alt="Banner"></div>
                        <br>
                        <label for="banner">Banner (728x90px)</label>
                        <input type="file" name="banner">
                    </div>
                    <div class="form-group">
                        <label for="active">Active?</label>
                        <input type="checkbox" name="active" @if($advert->active == 1) {{ 'checked' }} @endif>
                    </div>
                    <button type="submit" class="btn btn-success">Update link</button>
                </form>
            </div>
        </div>
    </div>
@endsection