<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <title>@yield('title', 'Document')</title>

    @livewireStyles
</head>
<body>
    <div class="container mt-5">
      @yield('content')
    </div>

    @livewireScripts
</body>
</html>