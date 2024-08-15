@extends('back.layout')

@section('title')
admin Index
@endsection


@section('content')
<div class="my-5"></div>
<div class="my-5"></div>
<div class="my-5">
    <div class=" text-right p-5 w-75">
        <a href="{{ route('back.admins.index') }}" class="btn btn-info ">Back</a>
    </div>
</div>




<div class=" bg-dark w-100 text-start m-auto">
    {{ $admin->name }}
    <br>
    {{ $admin->email }}
    <br>
    <label for="">Role:</label>
    @foreach ($roles as $role)
        @if ($admin->hasRole($role->name))
                {{ $role->name }}
                <hr>
                <label for="">Permissions:</label>
                @foreach ($permissions as $permission)

                    @if ($role->hasPermissionTo($permission->name))
                            {{ $permission->name }}
                    @endif
                @endforeach
        @endif
    @endforeach
</div>

@endsection