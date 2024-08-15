@extends('back.layout')

@section('title')
Admin Index
@endsection


@section('content')
<div class="my-5"></div>

<div class="page-section my-5">
    <div class="container">
      <h1 class="text-center wow fadeInUp">   </h1>

      <form class="contact-form mt-5" action="{{ route('back.admins.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <input type="hidden" name="guard_name" value="{{  }}"> --}}
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Name</label>
            <input type="text"  class="form-control" placeholder="Admin Name .." name="name">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Email</label>
            <input type="email"  class="form-control" placeholder="Email Here .." name="email">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Roles</label>
            <select name="role_name" id="" class="select-control">
                <option value="none">None</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Password</label>
            <input type="password"  class="form-control" placeholder="Password Here .." name="password">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Password Confirmation</label>
            <input type="password"  class="form-control" placeholder="Password Here .." name="password_confirmation">
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