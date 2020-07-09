<nav class="navbar navbar-expand-lg  py-2  bg-nav-c  ">
    <div class="container">
        @php
            $setting = App\Setting::first();
        @endphp
        <a class="navbar-brand buk-29" href="{{route('home')}}"> <img src="{{ $setting ->logo ? request()->root().'/'. $setting ->logo : asset('images/logo.svg') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="custom-bars-icon"></i>
        </button>

        <div class="collapse navbar-collapse bar-sm" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto cairo ml-2 kml-e">
                <li class="nav-item ml-1">
                    <a class="nav-link" href="{{ route('home') }}">الرئيسية</a>
                    <span class="d-block nav-bol"><i class="fas fa-ellipsis-h"></i></span>
                </li>
                @foreach(@App\Page::all()->where('place','header') as $page)
                    <li class="nav-item ml-1">
                        <a class="nav-link" href="{{ route('page',$page->title) }}">{{$page->title}}</a>
                        <span class="d-block nav-hid"><i class="fas fa-ellipsis-h"></i></span>
                    </li>
                @endforeach
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
                    <a class="nav-link" href="{{ route('account.orders.create') }}">طلب خدمة</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>

                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="{{ route('home') }}/#contact-form">اتصل بنا</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>
                </li>
                @auth
                    @if(auth()->user()->customer != null)
                        <li class="nav-item mx-1">
                            <a class="nav-link position-relative d-inline-block" href="{{route('nots.index')}}">
                                 <i class="fas fa-bell my-nfx"></i>
                                <span class="btn btn-danger btn-sm not-num">{{auth()->user()->nots->where('read',0)->count()}}</span>
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="{{route('account')}}">
                                {{auth()->user()->name}}
                            </a>
                            <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>
