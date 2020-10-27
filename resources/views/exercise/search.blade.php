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

@section('layoutSidenav_content')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <div class="card mb-3 shadow" style="border: none;">
                <div class="card-body pl-2 pr-2 pt-1 pb-1">
                    <table class="table table-borderless table-lg">
                        @forelse ($results as $result)
                        <tr class="table-borderless">
                            <td>
                                <div class="">
                                    {{ $result->name}}
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    {{ Str::words($result->description,10,'...')}}
                                </div>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="/exercises/{{$result->id}}" class="green">VIEW</a>
                                    <a href="/exercises/{{$result->id}}/edit" class="blue">EDIT</a>
                                    <a href="/exercises/{{$result->id}}/delete" class="red">DELETE</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger my-2" role="alert">
                            No Records Found!
                          </div>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection