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



@component('NavlinksComponents::modal')

@slot('modalId')
add-role
@endslot

@slot('title')
Add a role
@endslot

@slot('body')

<form onsubmit="event.preventDefault();addRole()">

    <div class="container">

        <div class="row">
            <input id="name-role" class="form-control" name="name" type="text" placeholder="Name...">
        </div>

        <div class="container m-2" id="all-permissions"></div>


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

<form onsubmit="event.preventDefault();addPermission()">

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

                if (!$('#all-permissions').empty())
                    return;

                response.map(function(permission) {
                    let child = $('<div><input type="checkbox" class="form-check-input" id="permission-number-' + permission.id + '"><label for="permission-number-' + permission.id + '">' + permission.name + '</label></div>');
                    $('#all-permissions').append(child);
                });

                $("#add-role").modal('toggle');
            }
        });

    }

    function addRole() {

        let name = $('#name-role').val();
        let permissions = [];

        $('#all-permissions').children().map((index, permission) => {
            if (permission.childNodes[0].checked)
                permissions.push(permission.childNodes[1].textContent);
        });

        if (name.length < 3) {
            alert('input must be more than 3 characters');
            return;
        }

        let newRole = {
            name: name,
            permissions: permissions,
            _token: '{{csrf_token()}}'
        }

        $.ajax({
            type: "post",
            url: "{{route('add-role')}}",
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

    function addPermission() {

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
                console.log(response);
                alert(response.msg);
                if (response.success)
                    location.reload();
            }
        });
    }

    function deleteItem(id) {

        let data = {
            id:id
        };

        $.ajax({
            type: "get",
            url: "{{route('delete-role')}}?id=" + id,
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