@extends('back.layout')

@section('title')
role Index
@endsection


@section('content')
<div class="my-5"></div>
<div class="my-5"></div>
<div class="my-5">
    <div class=" text-right p-5 w-75">
        <a href="{{ route('back.roles.index') }}" class="btn btn-info ">Back</a>
    </div>
</div>




<div class=" bg-dark w-100 text-start m-auto">
    {{ $role->name }}
    <div class="my-4">
        @foreach ($permissions as $permission)
                <input type="checkbox" name="" id="" value="{{ $permission->name }}"
                @if($role->hasAnyPermission($permission)) checked @else disabled @endif
                >
                <label for="">{{ $permission->name }}</label>
        @endforeach
    </div>
</div>

@endsection