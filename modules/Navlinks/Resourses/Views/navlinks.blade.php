@extends('DashboardViews::layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">NavLinks</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('navlinks-page')}}">NavLinks</a></li>
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
                                    <button title="add a new navlink" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#add-navlink">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Parent</th>
                                        <th class="d-flex justify-content-center">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($navlinks as $navlink)
                                    <tr>
                                        <td>{{$navlink->id}}</td>
                                        <td>{{$navlink->name}}</td>
                                        <td>{{$navlink->link}}</td>
                                        <td>@if ($navlink->parentName == null)
                                            -
                                            @else
                                            {{$navlink->parentName}}
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <button onclick="showEdit(`{{$navlink->id}}`)" title="edit" class=" btn btn-sm btn-default"><i class="fas fa-pen"></i></button>
                                            <button id="delete-{{$navlink->id}}" onclick="deleteItem(`{{$navlink->id}}`)" title="delete" class=" btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
add-navlink
@endslot

@slot('title')
Add
@endslot

@slot('body')

<form onsubmit="event.preventDefault();handleAddNavlink()">

    <div class="container">

        <div class="row">
            <input id="name" class="form-control" name="name" type="text" placeholder="Name...">
        </div>

        <div class="row">
            <input id="link" class="form-control mt-2" name="link" type="text" placeholder="Link...">
        </div>

        <div class="row mt-2">
            <select id="parentId" name="parentId" class="form-select form-select-lg w-100">
                <option selected value="null">-</option>
                @foreach ($parents as $parent )
                <option value="{{$parent->id}}">{{$parent->name}}</option>
                @endforeach
            </select>
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

<!-- edit modal -->
@component('NavlinksComponents::modal')

@slot('modalId')
edit-navlink
@endslot

@slot('title')
Edit
@endslot

@slot('body')

<form onsubmit="event.preventDefault();handleEditNavlink()">
    <input type="hidden" id="id-edit">
    <div class="container">

        <div class="row">
            <input id="name-edit" class="form-control" name="name-edit" type="text" placeholder="Name...">
        </div>

        <div class="row">
            <input id="link-edit" class="form-control" name="name-edit" type="text" placeholder="Link...">
        </div>

        <div class="row mt-2">
            <select id="parentId-edit" name="parentId-edit" class="form-select form-select-lg w-100">
                <option selected value="null">-</option>
                @foreach ($parents as $parent )
                <option value="{{$parent->id}}">{{$parent->name}}</option>
                @endforeach
            </select>
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


@endsection


@section('customScripts')
<script>
    function handleAddNavlink() {

        let name = $('#name').val();
        let parentId = $('#parentId').val();
        let link = $('#link').val();

        let newNavlink = {
            name: name,
            parentId: parentId,
            link:link,
            _token: '{{csrf_token()}}'
        }

        $isValid = checkValidation(name, parentId);

        if (!$isValid)
            return;

        $.ajax({
            type: "post",
            url: "{{route('navlinks-add')}}",
            contentType: 'application/json',
            data: JSON.stringify(newNavlink),
            dataType: "json",
            success: function(response) {
                alert(response.msg);
                if (response.success)
                    location.reload();
            }
        });
    }

    function handleEditNavlink() {

        let id = $('#id-edit').val();
        let name = $('#name-edit').val();
        let parentId = $('#parentId-edit').val();
        let link = $('#link-edit').val();

        newNavlink = {
            id: id,
            name: name,
            parentId: parentId,
            link:link,
            _token: '{{csrf_token()}}'
        }

        $isValid = checkValidation(name, parentId);

        if (!$isValid)
            return;

        $.ajax({
            type: "post",
            url: "{{route('navlinks-edit')}}",
            contentType: 'application/json',
            data: JSON.stringify(newNavlink),
            dataType: "json",
            success: function(response) {
                alert(response.msg);
                if (response.success)
                    location.reload();
            }
        });
    }

    function showEdit(id) {

        $.ajax({
            type: "get",
            url: "{{route('navlinks-edit-show')}}",
            contentType: 'application/json',
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {

                $('#name-edit').val(response.name);                
                $('#link-edit').val(response.link);
                $('#id-edit').val(id);

                if (response.parentId === null) {
                    $('#parentId-edit').val('null');
                } else {
                    $('#parentId-edit').val(response.parentId);
                }
                $('#edit-navlink').modal('toggle');
            }
        });

    }

    function deleteItem(id) {
        if (!confirm('are you sure you wanna delete this item?'))
            return;
        
        $.ajax({
            type: "get",
            url: "{{route('navlinks-delete')}}",
            contentType: 'application/json',
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.success === true)
                    setTimeout(() => {
                        location.reload()
                    }, 600);
            }
        });
    }

    function checkValidation(name, parentId) {
        if (name.length === 0) {
            alert('wrong input for name');
            return false;
        }
        return true;
    }
</script>
@endsection