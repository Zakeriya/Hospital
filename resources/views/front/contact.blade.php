@extends('front.layout')

@section('title')
    Contact
@endsection

@section('contact-active')
    active
@endsection

@section('content')
    <x-hero-section-component pageTitle="Contact" bannerTitle="Contact Us"></x-hero-section-component>

    <div class="page-section">
        <div class="container">
          <h1 class="text-center wow fadeInUp">Get in Touch</h1>

          <form class="contact-form mt-5" action="{{ route('front.contacts.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
              <div class="col-sm-6 py-2 wow fadeInLeft">
                <label for="fullName">Name</label>
                <input type="text" id="fullName" class="form-control" placeholder="Full name.." name="name">
              </div>
              <div class="col-sm-6 py-2 wow fadeInRight">
                <label for="emailAddress">Email</label>
                <input type="text" id="emailAddress" class="form-control" placeholder="Email address.." name="email">
              </div>
              <div class="col-12 py-2 wow fadeInUp">
                <label for="subject">Subject</label>
                <input type="text" id="subject" class="form-control" placeholder="Enter subject.." name="subject">
              </div>
              <div class="col-12 py-2 wow fadeInUp">
                <label for="message">Message</label>
                <textarea id="message" class="form-control" rows="8" placeholder="Enter Message.." name="msg"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary wow zoomIn">Send Message</button>
          </form>
          @if (session('success'))
                <div class="alert alert-success m-auto text-center">{{ session('success') }}</div>
          @endif
        </div>
      </div>

      <div class="maps-container wow fadeInUp">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3710.3157513666183!2d39.159792325216316!3d21.57359466884376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d10e43b95669%3A0x625a2926cd290979!2z2LXYp9mF2YjZhNmK!5e0!3m2!1sar!2ssa!4v1722749102600!5m2!1sar!2ssa"
         width="100%" height="300" style="border:0;" allowfullscreen=""
         loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
@endsection