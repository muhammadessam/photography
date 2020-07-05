<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="stylesheet" href="{{asset('webProject/icofont/css/icofont.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title> توثيق</title>
    </head>
    <body>        
        @if (isset($isAccount) && $isAccount)
        @include('site.partials.account-header')
        @else
            @include('site.partials.main-header')
        @endif
        @yield('content')
        @include('site.partials.footer')

        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
        <script src="{{asset('js/jquery.countup.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        @yield('js')
    </body>
    
</html>
    
