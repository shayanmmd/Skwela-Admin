@extends('DashboardViews::layout')

@section('content')

<div class="container">
    <form enctype="multipart/form-data" method="post" action="{{route('profile-update')}}">
        @csrf
        <div class="row justify-content-center">

            @if ($avatar)
            <img id="preview-avatar" class="img-fluid mt-2 rounded-circle" width="400" height="auto" src="{{url('storage/' . $avatar)}}" alt="">
            @else
            <img id="preview-avatar" src="dist/img/avatar.png" class="img-circle elevation-2" width="400" height="auto" alt="User Image">
            @endif

            <div class="custom-file mt-2">
                <input id="profile-picture" accept=".jpg, .jpeg, .png" name="file" type="file" class="custom-file-input">
                <label class="custom-file-label" for="exampleInputFile">Choose Your Picture</label>
            </div>

            <input value="{{$user->name}}" placeholder="Name..." name="name" type="text" class="col-12 form-control form-control-sm mt-2">
            <input value="{{$user->email}}" placeholder="Email..." name="email" type="text" class="col-12 form-control form-control-sm mt-2">
        </div>
        <div class="d-flex justify-content-center">
            <button class=" mt-3 btn btn-sm btn-success " type="submit">save changes</button>
        </div>
    </form>
</div>

@endsection

@section('customScripts')

<script>
    $(document).ready(() => {

        $('#profile-picture').on('change', function() {
            previewPhoto()
        });

        function previewPhoto() {

            const input = document.getElementById('profile-picture');                                   
            const file = input.files;

            if (file) {
                const fileReader = new FileReader();
                const preview = document.getElementById('preview-avatar');

                fileReader.onload = event => {
                    preview.setAttribute('src', event.target.result);
                }
                fileReader.readAsDataURL(file[0]);
            }
        }

    });
</script>

@endsection