@extends('back.layout')

@section('title')
user Index
@endsection


@section('content')
<div class="my-5"></div>
<div class="my-5"></div>
<div class="my-5">
    <div class=" text-right p-5 w-75">
        <a href="{{ route('back.users.index') }}" class="btn btn-info ">Back</a>
    </div>
</div>




<div class=" bg-dark w-100 text-start m-auto">
    {{ $user->name }}
    <br>
    {{ $user->email }}
</div>

@endsection