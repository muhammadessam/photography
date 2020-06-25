<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media text-center">
                        <img src="{{asset('admin/dist/img/const-tech.jpeg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                        </div>
                    </div>
                    <!-- Message End -->
                </a>

                <div class="dropdown-divider"></div>
                <form action="{{route('admin.logout')}}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item dropdown-footer">تسجيل الخروج</button>
                </form>
            </div>
        </li>
    </ul>
</nav>
