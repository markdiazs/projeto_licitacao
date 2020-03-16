<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}
    <script src="https://d3js.org/d3.v5.min.js"></script>
    {{-- <script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/core.js"></script> --}}
    {{-- <script src="https://d3js.org/d3.v4.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="axios.js"></script> --}}
    <title>Buscar Licitação</title>
</head>
<body>
    <div class="container">

        <div role="main">
            @hasSection ('body')
                @yield('body')
            @endif
        </div>
    </div>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>

    @hasSection ('javascript')
        @yield('javascript')
    @endif
</body>
</html>
