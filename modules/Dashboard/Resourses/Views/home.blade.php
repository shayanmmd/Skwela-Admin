@extends('DashboardViews::layout')

@section('content')

<div class="container">
    <div style="font-size: 39px;" class="row justify-content-center">
        <p>Hi {{auth()->user()->name}} 🙌</p>
    </div>

    <div style="font-size: 20px;" class="row justify-content-center">
        <p>we are glad that you are here with us</p>
    </div>
</div>

@endsection