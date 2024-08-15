@extends('back.layout')

@section('title')
role Index
@endsection


@section('content')
<div class="my-5"></div>
<div class="my-5"></div>
<div class="my-5">
    <div class=" text-right p-5 w-75">
        <a href="{{ route('back.roles.create') }}" class="btn btn-info ">Add role</a>
    </div>
</div>


@if (count($roles)>0 )

<div class=" bg-dark w-100 text-start m-auto">
    <table class="table w-75 m-auto my-4 ">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Role</th>
            <th scope="col">Guard</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->guard_name }}</td>
                    <td>
                        <a href="{{ route('back.roles.edit',['role'=>$role]) }}" class="btn btn-info d-inline ">Edit</a>
                        <a href="{{ route('back.roles.show',['role'=>$role]) }}" class="btn btn-success d-inline ">Show</a>
                        <form action="{{ route('back.roles.destroy',['role'=>$role]) }}" method="post" class="d-inline mt-2">
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