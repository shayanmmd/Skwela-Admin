@extends('DashboardViews::layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Permissions</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('permissions-page')}}">Permissions</a></li>
                    <li class="breadcrumb-item active">SkwelaAdmin</li>
                </ol>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6 d-flex justify-content-end">
                                    <button onclick="openModalAddRole()" type="button" class="btn btn-sm btn-success">
                                        <i class="fa fa-plus"></i>
                                        add a role
                                    </button>

                                    <button type="button" class="btn btn-sm btn-success ml-1" data-toggle="modal" data-target="#add-permission">
                                        <i class="fa fa-plus"></i>
                                        add a Permission
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Role</th>
                                        <th>Permissions</th>
                                        <th class="d-flex justify-content-center">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            <ul>
                                                @foreach ($role->permissions as $permission )
                                                <li style="list-style-type: square;">
                                                    {{$permission->name}}
                                                </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <button onclick="showEdit(`{{$role->id}}`)" title="edit" class=" btn btn-sm btn-default"><i class="fas fa-pen"></i></button>
                                            <button id="delete-{{$role->id}}" onclick="deleteItem(`{{$role->id}}`)" title="delete" class=" btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </section>

</div>



@component('NavlinksComponents::modal')

@slot('modalId')
add-role
@endslot

@slot('title')
Add a role
@endslot

@slot('body')

<form onsubmit="event.preventDefault();handleAddRole()">

    <div class="container">

        <div class="row">
            <input id="name-role" class="form-control" name="name" type="text" placeholder="Name...">
        </div>

        <div class="container" id="all-permissions"></div>


        <div class="row mt-2">
            <button type="submit" class="btn btn-sm btn-success w-100">save changes</button>
        </div>
    </div>

</form>

@endslot

@slot('footer')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
@endslot

@endcomponent

<!--  -->




@component('NavlinksComponents::modal')

@slot('modalId')
add-permission
@endslot

@slot('title')
Add a permission
@endslot

@slot('body')

<form onsubmit="event.preventDefault();handleAddPermission()">

    <div class="container">

        <div class="row">
            <input id="name-permission" class="form-control" name="name" type="text" placeholder="Name...">
        </div>

        <div class="row mt-2">
            <button type="submit" class="btn btn-sm btn-success w-100">save changes</button>
        </div>
    </div>

</form>

@endslot

@slot('footer')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
@endslot

@endcomponent


<!--  -->



@endsection


@section('customScripts')



<script>
    function openModalAddRole() {

        $.ajax({
            type: "get",
            url: "{{route('get-permissions')}}",
            dataType: "json",
            success: function(response) {

                response.map(function(permission) {
                    // <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    let child = $('<div><input type="checkbox" class="form-check-input" id="exampleCheck1">' + permission.name + ' </div>');
                    $('#all-permissions').append(child);
                });

                $("#add-role").modal('toggle');
            }
        });

    }

    function handleAddRole() {

        let name = $('#name-role').val();

        if (name.length < 3) {
            alert('input must be more than 3 characters');
            return;
        }

        let newRole = {
            name: name,
            _token: '{{csrf_token()}}'
        }

        $.ajax({
            type: "post",
            url: "{{route('add-role')}}",
            contentType: 'application/json',
            data: JSON.stringify(newRole),
            dataType: "json",
            success: function(response) {
                alert(response);
                if (response.success)
                    location.reload();
            }
        });
    }

    function handleAddPermission() {

        let name = $('#name-permission').val();

        if (name.length < 3) {
            alert('input must be more than 3 characters');
            return;
        }

        let newRole = {
            name: name,
            _token: '{{csrf_token()}}'
        }

        $.ajax({
            type: "post",
            url: "{{route('add-permission')}}",
            contentType: 'application/json',
            data: JSON.stringify(newRole),
            dataType: "json",
            success: function(response) {
                alert(response.msg);
                if (response.success)
                    location.reload();
            }
        });
    }
</script>
@endsection