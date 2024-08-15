@extends('back.layout')

@section('title')
Ueer Update
@endsection


@section('content')
<div class="my-5"></div>

<div class="page-section my-5">
    <div class="container">
      <h1 class="text-center wow fadeInUp">   </h1>

      <form class="contact-form mt-5" action="{{ route('back.admins.update',$admin) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Name</label>
            <input type="text"  class="form-control" placeholder="Admin Name .." name="name" value="{{ $admin->name }}">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Roles</label>
            <select name="role_name" id="" class="select-control">
                <option value="none">None</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}"
                        @if ($admin->hasRole($role->name)==$role->name)
                        selected
                        @endif
                        >{{ $role->name }} </option>
                @endforeach
            </select>
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