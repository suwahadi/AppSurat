@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center; font-weight: 600;">Access Forbidden</div>

                <div class="panel-body">

                        <div style="padding: 5px; color: red; text-align: center; margin-bottom: 20px;">
                            <strong>Akses Anda Dibatasi!</strong>
                        </div>
                        
                        <div style="text-align: center;">
                            <a href="{{ url('/dashboard') }}"><button class="btn btn-primary">< Back to Home</button></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection