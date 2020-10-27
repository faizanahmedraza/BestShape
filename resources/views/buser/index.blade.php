@extends('layouts.dashboard')

@section('styles')
<style>
    td {
        white-space: nowrap;
        text-align: center;
    }
</style>
@endsection

@section('layoutSidenav_content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4 mt-4">
                <li class="breadcrumb-item active">
                    BestShape -- Users
                </li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                </div>
                <div class="col-xl-3 col-md-6">
                </div>
                <div class="col-xl-3 col-md-6">
                </div>
                <div class="col-xl-3 col-md-6">
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                </div>
            </div>
            <div class="card mb-4">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID
                                </th>
                                <th>FullName
                                </th>
                                <th>Phone
                                </th>
                                <th>Email
                                </th>
                                <th>Address
                                </th>
                                <th>Days
                                </th>
                                <th>EnergyUnits
                                </th>
                                <th>WeightUnits
                                </th>
                                <th>HeightUnits
                                </th>
                                <th>ActivityLevel
                                </th>
                                <th>User
                                </th>
                                <th>Coach
                                </th>
                                <th>Terms&Conditions
                                </th>
                                <th>CreatedAt
                                </th>
                                <th>UpdatedAt
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($busers as $buser)
                            <tr>
                                <td>{{ $buser->id }}</td>
                                <td>{{ $buser->fullname }}</td>
                                <td>{{ $buser->phone }}</td>
                                <td>{{ $buser->email }}</td>
                                <td>{{ $buser->address }}</td>
                                <td>{{ $buser->days }}</td>
                                <td>{{ $buser->energy_units }}</td>
                                <td>{{ $buser->weight_units }}</td>
                                <td>{{ $buser->height_units }}</td>
                                <td>{{ $buser->activity_level }}</td>
                                <td>{{ $buser->user }}</td>
                                <td>{{ $buser->coach }}</td>
                                <td>{{ $buser->tnc }}</td>
                                <td>{{ $buser->created_at }}</td>
                                <td>{{ $buser->updated_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <div class="my-2">{{ $busers->links() }}</div>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
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