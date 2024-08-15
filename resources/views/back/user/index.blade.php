@extends('back.layout')

@section('title')
user Index
@endsection


@section('content')
<div class="my-5"></div>
<div class="my-5"></div>
<div class="my-5">
    @if (Auth::guard('admin')->user()->hasPermissionTo('add_user'))
        <div class=" text-right p-5 w-75">
            <a href="{{ route('back.users.create') }}" class="btn btn-info ">Add User</a>
        </div>
    @endif
</div>


@if (count($users)>0 )

<div class=" bg-dark w-100 text-start m-auto">
    <table class="table w-75 m-auto my-4 ">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">User Name </th>
            <th scope="col">User Email </th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if (permission('edit_user'))

                        <a href="{{ route('back.users.edit',['user'=>$user]) }}" class="btn btn-info d-inline ">Edit</a>
                        @endif
                        <a href="{{ route('back.users.show',['user'=>$user]) }}" class="btn btn-success d-inline ">Show</a>
                        <form action="{{ route('back.users.destroy',['user'=>$user]) }}" method="post" class="d-inline mt-2">
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