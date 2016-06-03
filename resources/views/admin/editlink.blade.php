@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Edit link</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <form action="{{ url("adminplace/links/$link->id") }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="realurl">Real Url</label>
                        <input type="text" name="realurl" class="form-control" value="{{ $link->realurl }}">
                    </div>
                    <div class="form-group">
                        <label for="shorturl">Short Url</label>
                        <input type="text" name="shorturl" class="form-control" value="{{ $link->shorturl }}">
                    </div>
                    <div class="form-group">
                        <label for="shorturl">Views</label>
                        <input type="text" name="views_count" class="form-control" value="{{ $link->views_count }}">
                    </div>
                    <div class="form-group">
                        <label for="shorturl">Preview</label>
                        <input type="checkbox" name="preview"  @if($link->preview == '1') {{ 'checked' }} @endif>
                    </div>
                    <div class="form-group">
                        <label for="shorturl">Advertise</label>
                        <input type="checkbox" name="advertise"  @if($link->advertise == '1') {{ 'checked' }} @endif>
                    </div>
                    <button type="submit" class="btn btn-success">Update link</button>
                </form>
            </div>
        </div>
    </div>
@endsection