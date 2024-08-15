@extends('front.layout')

@section('title')
    News
@endsection

@section('news-active')
    active
@endsection

@section('content')
    <x-hero-section-component pageTitle="Blog" bannerTitle="News"></x-hero-section-component>

    <div class="page-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              {{-- blog section  --}}
                <x-blog-component :blogs="$blogs"></x-blog-component>

                {{-- End  blog section  --}}
            </div>
            <div class="col-lg-4">
              <div class="sidebar">
                <div class="sidebar-block">
                  <h3 class="sidebar-title">Search</h3>
                  <form action="{{ route('front.searchBlog') }}" class="search-form" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Type a keyword and hit enter" name="word">
                      <button type="submit" class="btn"><span class="icon mai-search"></span></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div> <!-- .row -->
        </div> <!-- .container -->
      </div> <!-- .page-section -->

@endsection