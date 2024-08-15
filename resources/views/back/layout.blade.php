<!DOCTYPE html>
<html lang="en">
  @include('back.partials.head')
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('back.partials.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('back.partials.navbar')
        <!-- partial -->
        @yield('content')
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('back.partials.scripts')
  </body>
</html>
