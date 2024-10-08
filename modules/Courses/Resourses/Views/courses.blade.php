@extends('DashboardViews::layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Courses</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('courses-page')}}">Courses</a></li>
                    <li class="breadcrumb-item active">SkwelaAdmin</li>
                </ol>
            </div>
        </div>
    </div>
</div>



@endsection