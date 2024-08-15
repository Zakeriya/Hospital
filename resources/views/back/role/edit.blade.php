@extends('back.layout')

@section('title')
Admin Index
@endsection


@section('content')
<div class="my-5"></div>

<div class="page-section my-5">
    <div class="container">
      <h1 class="text-center wow fadeInUp">   </h1>

      <form class="contact-form mt-5" action="{{ route('back.roles.update',['role'=>$role]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- <input type="hidden" name="guard_name" value="{{  }}"> --}}
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Name</label>
            <input type="text"  class="form-control" placeholder="Role Name .." name="name" value="{{ $role->name }}">
          </div>

          <div class="col-12 py-2 wow fadeInUp">

                @foreach ($permissions as $permission)
                    <input type="checkbox" id="{{ $permission }}" name="permissions[]" value="{{ $permission->name }}"
                    @if ($role->hasPermissionTo($permission->name)) checked @endif
                    >
                    <label for="{{ $permission }}">{{ ucfirst(str_replace('-', ' ', $permission->name)) }}</label><br>
                @endforeach
          </div>
        </div>
        <button type="submit" class="btn btn-primary wow zoomIn">Submit</button>
      </form>
      @if (session('success'))
            <div class="alert alert-success m-auto text-center">{{ session('success') }}</div>
      @endif
    </div>
    @include('inc.errros')
</div>
@endsection