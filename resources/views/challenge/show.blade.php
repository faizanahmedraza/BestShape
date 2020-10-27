@extends('layouts.dashboard')

@section('styles')
    <style>
        a.blue {
        background: #3498db;
        color: white;
        font-size: 1.2rem;
        padding: .3rem;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 0 15px lightgray;
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
    <a class="nav-link" href="/exercises">
        <div class="sb-nav-link-icon">
            <i class="fas fa-walking"></i>
        </div>
        Exercices
    </a>
    <a class="nav-link {{ Request::path() === 'challenges/'.$challenge->id ? 'active' : '' }}" href="/challenges">
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
                    Challenges -- Details
                </li>
            </ol>
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
                            src="{{ asset('/videos/'.$challenge->video_url) }}"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
            <div
                class="mb-3 row justify-content-center">
                <div class="col-xl-3 col-md-3">
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="input-group mb-3">
                        <span
                            class="input-group-text"
                            style="background: transparent; border:none;">Exercise
                            Name</span>
                        <input type="text"
                            id="name" name="name"
                            aria-label="Exercise name"
                            class="form-control"
                            value="{{ $challenge->name }}"
                            readonly>
                    </div>
                    <div class="input-group">
                        <span
                            class="input-group-text mr-4"
                            style="background: transparent; border:none;">Description</span>
                        <textarea
                            name="description"
                            class="form-control ml-1"
                            id="" cols="40"
                            rows="3"
                            readonly>{{ $challenge->description }}</textarea>
                    </div>
                    <div
                        class="row justify-content-end mt-3">
                        <a href="/challenges/"
                            class="blue">Back</a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                </div>
            </div>
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