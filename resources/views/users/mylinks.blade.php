@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        @if(count($links) > 0)
            <table class="table table-stripped">
                <thead>
                <tr>
                    <td>Real Url</td>
                    <td>Short Url</td>
                    <td>Date Created</td>
                    <td>Views Count</td>
                    <td>Preview?</td>
                    <td>Advertise?</td>
                </tr>
                </thead>
                <tbody>
                @foreach($links as $link)
                    <tr>
                        <td><a href="{{ $link->realurl }}">{{ $link->realurl }}</a></td>
                        <td><a href="{{ env('APP_URL') }}/{{ $link->shorturl }}">{{ env('APP_URL') }}/{{ $link->shorturl }}</a></td>
                        <td>{{ $link->created_at }}</td>
                        <td>{{ $link->views_count }}</td>
                        <td>{{ $link->preview == 0 ? 'No': 'Yes'  }}</td>
                        <td>{{ $link->advertise == 0 ? 'No' : 'Yes' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>There is no links added by {{ Auth::user()->name }}</p>
        @endif
    </div>
@endsection
