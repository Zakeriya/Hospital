{{-- blog section  --}}

@if (count($blogs)>0)
    <div class="page-section bg-light">
            <div class="container">
            <h1 class="text-center wow fadeInUp">Latest News</h1>
            <div class="row mt-5">
        @foreach ($blogs as $blog)

            <div class="col-lg-4 py-2 wow zoomIn">
                <div class="card-blog">
                    <div class="header">
                    <div class="post-category">
                        <a href="#">{{ $blog->title }}</a>
                    </div>
                    <a href="blog-details.html" class="post-thumb">
                        <img src="{{ asset("storage/$blog->image") }}" alt="">
                    </a>
                    </div>
                    <div class="body">
                    <h5 class="post-title"><a href="blog-details.html">{{ $blog->desc }}</a></h5>
                    <div class="site-info">
                        <div class="avatar mr-2">
                        <div class="avatar-img">
                            <img src="{{ asset("storage/$blog->person_image") }}" alt="">
                        </div>
                        <span>{{ $blog->name }}</span>
                        </div>
                        <span class="mai-time"></span> {{ $blog->created_at->diffForHumans() }}
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
            </div>
            </div>
            {{-- pagination --}}
            <div class="col-12 my-5">
                <nav aria-label="Page Navigation">
                 {{ $blogs->links() }}
                </nav>
              </div>
              {{-- End of pagination --}}
    </div> <!-- .page-section -->
@endif
{{-- end  blog section  --}}