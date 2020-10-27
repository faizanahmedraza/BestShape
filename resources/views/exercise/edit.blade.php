@extends('layouts.dashboard')

@section('styles')
<style>
    a.blue {
        background: #3498db;
        color: white;
        font-size: 1.1rem;
        padding: .4rem .7rem;
        text-decoration: none;
        border-radius: 5px;
    }
</style>
@endsection

@section('nav')
<div class="nav">
    <a class="nav-link" href="/home" aria-selected="true">
        <div class="sb-nav-link-icon">
            <i class="far fa-user"></i>
        </div>
        Users
    </a>
    <a class="nav-link" href="/recipes">
        <div class="sb-nav-link-icon">
            <i class="fas fa-utensils"></i>
        </div>
        Recipes
    </a>
    <a class="nav-link {{ Request::path() === 'exercises/'.$exercise->id.'/edit' ? 'active' : '' }}" href="/exercises">
        <div class="sb-nav-link-icon">
            <i class="fas fa-walking"></i>
        </div>
        Exercices
    </a>
    <a class="nav-link" href="/challenges">
        <div class="sb-nav-link-icon">
            <i class="fas fa-tasks"></i>
        </div>
        Challenges
    </a>
</div>
@endsection

@section('layoutSidenav_content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-2 mt-2">
                <li
                    class="breadcrumb-item active">
                    Exercises -- Edit
                </li>
            </ol>
            <form method="POST"
                action="/exercises/{{$exercise->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div
                    class="row flex-row justify-content-center">
                    <div class="col-3"></div>
                    <div class="col-6 p-3">
                        <div
                            class="embed-responsive embed-responsive-16by9">
                            <iframe
                                class="embed-responsive-item"
                                id="video-exr"
                                name="video-exr"
                                src="{{asset('/videos/'.$exercise->video_url)}}"
                                allowfullscreen></iframe>
                        </div>
                        <label for="video"
                            class="custom-file-upload mt-2 d-flex justify-content-center">
                            Edit Video
                        </label>
                        <input name="video_url"
                            type="file"
                            accept="video/*"
                            class="form-control"
                            value="{{asset('/videos/')}}.{{ $exercise->video_url }}"
                            onchange="previewFile(this)"
                            style="border: none;"/>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div
                    class="mb-3 row justify-content-center">
                    <div
                        class="col-xl-3 col-md-3">
                    </div>
                    <div
                        class="col-xl-6 col-md-6">
                        <div
                            class="input-group mb-3">
                            <span
                                class="input-group-text"
                                style="background: transparent; border:none;">Exercise
                                Name</span>
                            <input type="text"
                                id="name"
                                name="name"
                                aria-label="Exercise name"
                                class="form-control"
                                value="{{ $exercise->name }}">
                        </div>
                        <div class="input-group">
                            <span
                                class="input-group-text mr-4"
                                style="background: transparent; border:none;">Description</span>
                            <textarea
                                name="description"
                                class="form-control ml-1"
                                id="" cols="40"
                                rows="3">{{ $exercise->description }}</textarea>
                        </div>
                        <div
                            class="row justify-content-between mt-3">
                            <a href="/exercises/"
                                class="blue">Back</a>
                            <button
                                class="btn btn-info">Save</button>
                        </div>
                    </div>
                    <div
                        class="col-xl-3 col-md-3">
                    </div>
                </div>
            </form>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div
                class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">
                    Copyright &copy; {{ config('app.name') }} 2020</div>
                <div>
                    <a href="#">Privacy
                        Policy</a>
                    &middot;
                    <a href="#">Terms
                        &amp;
                        Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection

@section('scripts')
<script>
     function previewFile(input)
    {
        var file = $("input[type=file]").get(0).files[0];
        if(file)
        {
            var reader = new FileReader();
            reader.onload = function() {
                $('#video-exr').attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection