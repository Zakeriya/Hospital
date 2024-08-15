{{-- @dd($myPatients) --}}

@extends('front.layout')

@section('title')
    My Patients
@endsection

@section('myPatients-active')
    active
@endsection

@section('content')

@if (count($myPatients)>0)

    <div class="p-5 w-75 m-auto">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Doctor Name</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($myPatients as $myPatient)

                <tr>
                    <th scope="row">#</th>
                    <td>{{ $myPatient->name }}</td>
                    <td>{{ $myPatient->number }}</td>
                    <td>{{ $myPatient->doctor->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection