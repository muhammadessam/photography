<nav class="navbar navbar-expand-lg  py-4  bg-nav-c  ">
    <div class="container">
        <a class="navbar-brand buk-29" href="#"> <img src="{{asset('images/logo.svg')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="custom-bars-icon"></i>
        </button>

        <div class="collapse navbar-collapse bar-sm" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto cairo ml-2">
                <li class="nav-item ml-1">
                    <a class="nav-link" href="{{ route('home') }}">الرئيسية</a>
                    <span class="d-block nav-bol"><i class="fas fa-ellipsis-h"></i></span>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href=" "> من نحن</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="{{route('images')}}">معرض صور</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>

                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="{{route('videos')}}">معرض الفيديو</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>

                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href=" ">طلب خدمة</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>

                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href=" ">اتصل بنا</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>

                </li>
                @auth
                    @if(auth()->user()->customer != null)
1                       <li class="nav-item mx-1">
                            <a class="nav-link" href="{{route('my_bills')}}">فواتيري</a>
                            <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>
    