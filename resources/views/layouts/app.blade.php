<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />

    <link  rel="icon" type="image/svg+xml" href="{{ asset(Config::get('constants.favicon')) }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link  href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <link  href="{{ asset('/css/bulma.css') }}" rel="stylesheet" />
    <link  href="{{ asset('/jqtree/jqtree.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/js.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/css/sweetalert2_min.css') }}">
    <script src="{{ asset('/js/sweetalert2.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script src="{{ asset('/jqtree/tree.jquery.js') }}"></script>

    <script src="{{ asset('/js/ckeditor5/ckeditor.js') }}"></script>



    @livewireStyles

  </head>
  <body>

    @include('layouts.navigation',["user"=>false])

    {{ $slot }}

    @include('layouts.footer')

    @livewireScripts

  </body>
</html>
