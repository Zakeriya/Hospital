<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" method="POST" action="{{ route('front.appointments.store') }}">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" placeholder="Full name" name="name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="email" class="form-control" placeholder="Email address.." name="email">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" class="form-control" name="appointment">
          </div>
          @if (count($doctors)>0)
            <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                <select name="doctor_id"  class="custom-select">
                        @foreach ($doctors as $doctor)
                        @if ($doctor->status!='pending')
                        <option value="{{$doctor->id  }}">{{ $doctor->major }}</option>
                        @endif
                        {{-- <input type="hidden" name="doctor_id" value="{{ $doctor->id }}"> --}}
                        @endforeach
                </select>
            </div>
          @endif
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" class="form-control" placeholder="Number.." name="number">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.." name="message"></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->