@extends('layouts.user')

@section('content')
    <div class="jumbotron">
        @if(count($links) > 0)
            <table class="table table-condensed table-responsive">
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
                    <tr style="word-break: break-all;">
                        <td style="word-break: break-all;"><a href="{{ $link->realurl }}">{{ $link->realurl }}</a></td>
                        <td style="word-break: break-all;"><a href="{{ env('APP_URL') }}/{{ $link->shorturl }}">{{ env('APP_URL') }}/{{ $link->shorturl }}</a></td>
                        <td style="word-break: break-all;">{{ $link->created_at }}</td>
                        <td style="word-break: break-all;">{{ $link->views_count }}</td>
                        <td style="word-break: break-all;">{{ $link->preview == 0 ? 'No': 'Yes'  }}</td>
                        <td style="word-break: break-all;">{{ $link->advertise == 0 ? 'No' : 'Yes' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>There is no links added by {{ Auth::user()->name }}</p>
        @endif
    </div>
@endsection
