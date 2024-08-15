@extends('back.layout')

@section('title')
Admin Index
@endsection


@section('content')
<div class="my-5"></div>

@if (count($admins)>0 )

<div class=" bg-dark w-100 text-start m-auto">
    <div class=" text-right mb-3 w-75">
        <a href="{{ route('back.admins.create') }}" class="btn btn-info ">Add Admin</a>
    </div>
    <table class="table w-75 m-auto my-4 ">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Admin Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        @foreach ($roles as $role)
                            @if ($admin->hasRole($role->name))
                                {{ $role->name }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('back.admins.edit',['admin'=>$admin]) }}" class="btn btn-info d-inline ">Edit</a>
                        <a href="{{ route('back.admins.show',['admin'=>$admin]) }}" class="btn btn-success d-inline mt-1">Show</a>
                        <form action="{{ route('back.admins.destroy',['admin'=>$admin]) }}" method="post" class="d-inline mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection