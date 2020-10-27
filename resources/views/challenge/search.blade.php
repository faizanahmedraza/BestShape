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
            <table class="table table-borderless">
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
                            <a href="/challenges/{{$result->id}}" class="green">VIEW</a>
                            <a href="/challenges/{{$result->id}}/edit" class="blue">EDIT</a>
                            <a href="/challenges/{{$result->id}}/delete" class="red">DELETE</a>
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
    </main>
</div>
@endsection