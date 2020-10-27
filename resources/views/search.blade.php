@extends('layouts.dashboard')

@section('layoutSidenav_content')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
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
                    @forelse ($results as $result)
                    <tr>
                        <td>{{ $result->fullname }}</td>
                        <td>{{ $result->phone }}</td>
                        <td>{{ $result->email }}</td>
                        <td>{{ $result->address }}</td>
                        <td>{{ $result->days }}</td>
                        <td>{{ $result->energy_units }}</td>
                        <td>{{ $result->weight_units }}</td>
                        <td>{{ $result->height_units }}</td>
                        <td>{{ $result->activity_level }}</td>
                        <td>{{ $result->user }}</td>
                        <td>{{ $result->coach }}</td>
                        <td>{{ $result->tnc }}</td>
                        <td>{{ $result->created_at }}</td>
                        <td>{{ $result->updated_at }}</td>
                    </tr>
                    @empty
                    <div class="alert alert-danger my-2" role="alert">
                        No Records Found!
                      </div>
                    @endforelse
                </table>
            </div>
        </div>
    </main>
</div>
@endsection