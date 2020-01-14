<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <title>Cadastro de Produtos</title>
</head>
<body>
    <div class="container">
        @component('components.navbar',["current" => $current ])
        @endcomponent
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