<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto">
        <!-- Messages Dropdown Menu -->
        <li><a href="{{ route('admin.notifications') }}" class="dropdown-item">
                <i class="fas fa-bell my-nfx"></i>
                اشعارات
                @if (auth()->guard('admin')->user()->unreadNotifications()->count())
                    <span class="badge badge-danger">{{ auth()->guard('admin')->user()->unreadNotifications()->count() }}</span>
                @endif
            </a></li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user-circle-o"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{asset('admin/dist/img/logo.jpeg')}}" alt="User Avatar"
                             class="img-size-50 ml-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{auth()->user()->name}}
                                <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                            </h3>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>

                <div class="dropdown-divider"></div>
                <div class="dropdown-divider"></div>
                <form action="{{route('admin.logout')}}" method="post" class="text-center">
                    @csrf
                    <button type="submit" class="dropdown-itunreadNotifications()em dropdown-footer btn btn-default">
                        تسجيل الخروج
                    </button>
                </form>
            </div>
        </li>

    </ul>
</nav>
<!-- /.navbar -->
