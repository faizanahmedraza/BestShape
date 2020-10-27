@extends('layouts.dashboard')

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
    <a class="nav-link" href="/exercises">
        <div class="sb-nav-link-icon">
            <i class="fas fa-walking"></i>
        </div>
        Exercices
    </a>
    <a class="nav-link {{ Request::path() === 'challenges/create' ? 'active' : '' }}" href="/challenges">
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
                    Challenges -- Create
                </li>
            </ol>
            <form method="POST" action="{{route('challenges.store')}}" enctype="multipart/form-data">
                @csrf

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
                                src="{{url('https://www.youtube.com/embed/X_9VoqR5ojM')}}"
                                allowfullscreen></iframe>
                        </div>
                        <label for="video_url"
                            class="custom-file-upload mt-2"
                            style="cursor: pointer!important;">
                            Choose Video
                        </label>
                        <input name="video_url"
                            type="file"
                            class="form-control"
                            accept="video/*"
                            style="border:none;" onchange="previewFile(this)"/>
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
                                style="background: transparent; border:none;">Challenge
                                Name</span>
                            <input type="text"
                                id="name"
                                name="name"
                                aria-label="Exercise name"
                                class="form-control"
                                value="{{ old('name') }}" required>
                        </div>
                        <div class="input-group">
                            <span
                                class="input-group-text mr-4"
                                style="background: transparent; border:none;">Description</span>
                            <textarea
                                name="description"
                                class="form-control ml-1"
                                id="" cols="40"
                                rows="3" required>{{ old('description') }}</textarea>
                        </div>
                        <div
                            class="row justify-content-end mt-3 mr-1">
                            <button type="submit"
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