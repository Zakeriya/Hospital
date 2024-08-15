{{-- @dd($company) --}}

@foreach ($company as $item)
<header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> {{ $item->phone }}</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> {{ $item->email }}</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="{{ $item->facebook }}"><span class="mai-logo-facebook-f"></span></a>
              <a href="{{ $item->insta }}"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item @yield('home-active')">
              <a class="nav-link" href="{{ route('front.index') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('about-active')" href="{{ route('front.about') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('doctors-active')" href="{{ route('front.doctors') }}">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('news-active')" href="{{ route('front.news') }}">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('contact-active')" href="{{ route('front.contact') }}">Contact</a>
            </li>
            {{-- @php
                // $isDoctor = App\Models\Doctor::where('user_id', Illuminate\Support\Facades\Auth::user()->id)->get();
                $doctor=App\Models\Doctor::where('user_id',Illuminate\Support\Facades\Auth::user()->id)->get();
            @endphp --}}

            {{-- @if (count($isDoctor)>0) --}}
                @can('viewAny', App\Models\Doctor::class)

                <li class="nav-item">
                    <a class="nav-link @yield('myBlogs-active')" href="{{ route('front.myBlogs') }}">My Blogs</a>
                 </li>

                 <li class="nav-item">
                    <a class="nav-link @yield('myPatients-active')" href="{{ route('front.myPatients') }}">My Patients</a>
                 </li>
                @endcan

            {{-- @endif --}}
            <li class="nav-item">
              {{-- <a class="btn btn-primary ml-lg-3" href="#"></a> --}}

              <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger ml-lg-3"> Logout</button>
              </form>
            </li>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
</header>
@endforeach
