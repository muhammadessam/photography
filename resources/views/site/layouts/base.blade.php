<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="{{asset('public/'.@App\Setting::first()->icon)}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('public/'.'css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="stylesheet" href="{{asset('public/'.'webProject/icofont/css/icofont.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/'.'css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/'.'css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
        {{-- light box image --}}

        <link rel="stylesheet" href="{{asset('public/'.'css/lightgallery.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/'.'css/style.css')}}">
        <title>{{@App\Setting::first()->app_name}}</title>



    </head>
    <body>
        @include('site.partials.header')
        @yield('content')
        @include('site.partials.footer')

        <script src="{{asset('public/'.'js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('public/'.'js/popper.min.js')}}"></script>
        <script src="{{asset('public/'.'js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/'.'js/owl.carousel.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
        <script src="{{asset('public/'.'js/jquery.countup.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
        <script src="{{asset('public/'.'js/custom.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script src="{{asset('public/'.'js/lightgallery-all.min.js')}}"></script>
        <script src="{{asset('public/'.'js/jquery.mousewheel.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#lightgallery').lightGallery();
            });
        </script>
        <script src="{{asset('public/'.'js/main.js')}}"></script>
        @yield('js')
    </body>

</html>

