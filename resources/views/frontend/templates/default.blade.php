<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{ asset('assets/bootstrap4/css/bootstrap.min.css') }}">

    <title>{{ $title }}</title>
  </head>
  <body class="bg-light">
      {{-- navbar --}}
      @include('frontend.templates.partials.navbar')
      {{-- akhir navbar --}}
    <div class="content">
        @yield('content')
    </div>

    @include('frontend.templates.partials.footer')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/bootstrap4/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/bootstrap4/js/bootstrap.min.js') }}"></script>
    @stack('scripts')
  </body>
</html>