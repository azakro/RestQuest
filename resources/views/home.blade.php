@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> USER Dashboard</div>

                <div class="panel-body">
                    You are logged in as <strong>{{ Auth::user()->name }}</strong>!
                </div>
            </div>

            <div class="jumbotron">
                <h1>REST QUEST</h1>
            </div>
        </div>
    </div>
</div>
@endsection