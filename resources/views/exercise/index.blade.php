@extends('layouts.dashboard')

@section('styles')
<style>
    a.red {
        background: #e74c3c;
        color: white;
        font-size: 1.2rem;
        padding: .3rem;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 0 15px lightgray;
    }

    a.green {
        background: #2ecc71;
        color: white;
        font-size: 1.2rem;
        padding: .3rem;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 0 15px lightgray;
    }

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

@section('search')
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="GET" action="/exercise-search"
    role="search">

    <div class="input-group">
        <input class="form-control" type="text" name="search" placeholder="Search for..." aria-label="Search"
            aria-describedby="basic-addon2" />
        <div class="input-group-append">
            <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>
@endsection

@section('layoutSidenav_content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
        <h1 class="ml-3">Exercises</h1>
        <div class="container">
            @foreach ($exercises as $exercise)
            <div class="card mb-3 shadow" style="border: none;">
                <div class="card-body pl-2 pr-2 pt-1 pb-1">
                    <table class="table table-borderless m-2">
                        <tr class="table-borderless">
                            <td class="row flex-row justify-content-between pr-4 pt-1 pb-1">
                                <div class="">
                                {{ $exercise->name}}
                                </div>
                                <div class="mb-2">
                                {{ Str::words($exercise->description,10,'...')}}
                                </div>
                               <div class="actions">
                                <a href="/exercises/{{$exercise->id}}"
                                    class="green">VIEW</a>
                                <a href="/exercises/{{$exercise->id}}/edit"
                                    class="blue">EDIT</a>
                                <a href="/exercises/{{$exercise->id}}/delete"
                                    class="red">DELETE</a>
                               </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            @endforeach
            <div class="my-2">{{ $exercises->links() }}</div>
            <div
                class="row justify-content-end pr-5 mt-3">
                <a href="/exercises/create"
                    class="green shadow">Add New</a>
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
