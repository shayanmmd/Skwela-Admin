@extends('DashboardViews::layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">add a blog</h1>
            </div>
        </div>
    </div>

</div>


<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif

    @if (session('unsuccess'))
    <div class="alert alert-danger">
        {{session('unsuccess')}}
    </div>
    @endif


    <form enctype="multipart/form-data" method="post" action="{{route('store-blog')}}">
        @csrf
        <div class="row justify-content-center">

            <img id="preview-avatar" src="dist/img/no-image.jpg" class="img-circle elevation-2" width="400" height="auto" alt="User Image">


            <div class="custom-file mt-2">
                <input id="profile-picture" accept=".jpg, .jpeg, .png" name="file" type="file" class="custom-file-input">
                <label class="custom-file-label" for="exampleInputFile">Choose Your Post's Cover</label>
            </div>
            @error('file')
            <div class="error text-danger m-3">{{ $message }}</div>
            @enderror


        </div>

        <div class="form-group mt-2">
            <input value="{{old('title')}}" name="title" class="form-control mt-3" rows="3" placeholder="title"></input>
        </div>
        @error('title')
        <div class="error text-danger m-3">{{ $message }}</div>
        @enderror

        <div class="form-group mt-2">
            <textarea name="text" class="form-control" rows="3" placeholder="write your blog here..." style="height: 150px;">{{old('text')}}</textarea>
        </div>
        @error('text')
        <div class="error text-danger m-3">{{ $message }}</div>
        @enderror

        <div class="d-flex justify-content-center">
            <button class=" mt-3 btn btn-success " type="submit">Publish</button>
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