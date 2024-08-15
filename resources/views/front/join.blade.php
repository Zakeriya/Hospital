@extends('front.layout')

@section('title')
    Contact
@endsection

@section('content')
    <x-hero-section-component pageTitle="Join" bannerTitle="Join Us"></x-hero-section-component>

    <div class="page-section">
        <div class="container">
          <h1 class="text-center wow fadeInUp">Join Our Stuff</h1>

          <form class="contact-form mt-5" action="{{ route('front.join_doctors') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              {{-- <div class="col-sm-6 py-2 wow fadeInLeft">
                <label for="fullName">Name</label>
                <input type="text" id="fullName" class="form-control" placeholder="Full name.." name="name">
              </div> --}}
              {{-- <input type="hidden" name="name" value="{{ Auth::user()->name }}"> --}}
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              <div class="col-sm-6 py-2 wow fadeInRight">
                <label for="emailAddress">Major</label>
                <input type="text"  class="form-control" placeholder="Major .." name="major">
              </div>
              <div class="col-12 py-2 wow fadeInUp">
                <label for="subject">Phone</label>
                <input type="text"  class="form-control" placeholder="Phone.." name="phone">
              </div>
              <div class="col-12 py-2 wow fadeInUp">
                <label for="message">Image</label>
                <input type="file" name="image" id="" class="form-control">
              </div>
            </div>
            <button type="submit" class="btn btn-primary wow zoomIn">Send</button>
          </form>
          @if (session('success'))
                <div class="alert alert-success m-auto text-center">{{ session('success') }}</div>
          @endif
        </div>
        @include('inc.errros')
    </div>
@endsection