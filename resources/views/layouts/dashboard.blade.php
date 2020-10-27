<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - BestShape</title>
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    @yield('styles')
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">{{config('app.name')}}</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        @section('search')
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="GET"
            action="/search" role="search">

            <div class="input-group">
                <input class="form-control" type="text" name="search" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        @show
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                    style="width:(200px, 300px, 300px)">
                    <div class="card" style="border: none; background: transparent;">
                        <div class="row flex-row flex-nowrap justify-content-center">
                            <div class="col-6 col-md-6">
                                <img id="img-recipe" class="mx-auto mb-2" name="img-recipe"
                                    src="{{ asset('/images/profile.png') }}" alt=""
                                    style="width:100px!important; height: 100px!important; border:1px solid grey; border-style: dashed; border-radius: 50px;">

                                <strong style="white-space: nowrap;">{{ Auth::user()->name }}</strong>

                                <label for="img_url" class="custom-file-upload" id="choose-file-label"
                                    style="background:lightgrey; box-shadow: 0 0 5px grey; padding:3px; margin-top:10px; white-space:nowrap; margin-left: 10px; cursor: pointer;">
                                    Edit Image
                                </label>
                                <input name="img_url" type="file" id="img_url" accept=".jpg,.jpeg,"
                                    style="display: none;" value="{{ old('img_url') }}" />
                            </div>
                        </div>

                        <div class="d-flex justify-content-center flex-row flex-nowrap p-2">
                            <a href="/user/password/reset/{{ Auth::user()->id }}" class="mt-1 ml-3"
                                style="color:black; text-decoration:underline; white-space: nowrap; font-size:16px;">Change
                                Password</a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"
                                style="text-decoration: underline">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
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
                        <a class="nav-link" href="/challenges">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                            Challenges
                        </a>
                    </div>
                    @show
                    <div class="sb-sidenav-footer fixed-bottom text-white">
                        <div class="small">Logged
                            in as:</div>
                        {{ Auth::user()->name }}
                    </div>
            </nav>
        </div>
        @yield('layoutSidenav_content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{asset('/js/scripts.js')}}"></script>
    <script src="{{asset('/js/app.js')}}"></script>
    @yield('scripts')
</body>

</html>