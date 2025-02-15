<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  @include('back.auth.parts.head')

  <body>
    <!-- Content -->

    @yield('content')

    <!-- / Content -->

    @include('back.auth.parts.scripts')
  </body>
</html>
