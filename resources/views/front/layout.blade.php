<!DOCTYPE html>
<html lang="en">
    @include('front.parts.head')
<body>

  <!-- Back to top button -->
  @include('front.parts.backToTop')

  @include('front.parts.header')

  @yield('content')

  @include('front.parts.access')

  @include('front.parts.footer')

  @include('front.parts.scripts')

</body>
</html>
