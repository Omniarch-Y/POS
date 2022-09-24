<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Qemer pos', 'Qemer pos') }}</title>

    @livewireStyles

    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('js/mdb.min.js') }}" defer></script> --}}
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert.all.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
            crossorigin="anonymous" 
            referrerpolicy="no-referrer">
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- {{-- <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet"> --}} -->

    @if(session('status'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{session('status')}}'
            })
        </script>
    @endif
       
</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
    @include('sweetalert::alert')  
</body>
@include('sweetalert::alert')
@livewireScripts
</html>