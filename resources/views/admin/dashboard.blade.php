@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h5>Selamat Datang, {{ Auth::user()->name }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection