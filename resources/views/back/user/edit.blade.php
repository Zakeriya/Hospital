@extends('back.layout')

@section('title')
Ueer Update
@endsection


@section('content')
<div class="my-5"></div>

<div class="page-section my-5">
    <div class="container">
      <h1 class="text-center wow fadeInUp">   </h1>

      <form class="contact-form mt-5" action="{{ route('back.users.update',['user'=>$user]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- <input type="hidden" name="guard_name" value="{{  }}"> --}}
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Name</label>
            <input type="text"  class="form-control" placeholder="user Name .." name="name" value="{{ $user->name }}">
          </div>

          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Password</label>
            <input type="password"  class="form-control" placeholder="user Password .." name="password" >
          </div>

          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Password Confirm </label>
            <input type="password"  class="form-control" placeholder="user Password .." name="password_confirmation" >
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