@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Dashboard</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Users
                    </div>
                    <div class="panel-body">
                        Total users - {{ $totalUsers }} <br>
                        Users registered today - {{ $usersRegisteredToday }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Links
                    </div>
                    <div class="panel-body">
                        Total links - {{ $totalLinks }} <br>
                        Links added today - {{ $todaysLinks }} <br>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Advertiments
                    </div>
                    <div class="panel-body">
                        Total adverts - {{ $totalAdverts }} <br>
                        Adverts added today - {{ $advertsAddedToday }} <br>
                        Active adverts - {{ $activeAdverts }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection