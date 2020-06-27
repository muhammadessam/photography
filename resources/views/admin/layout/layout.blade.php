<!DOCTYPE html>
<html>
@include('admin.layout.header')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('admin.layout.navbar')
    @include('admin.layout.sidebar')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-{{\Carbon\Carbon::now()->format('Y')}} <a href="">Const tech</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b>
        </div>
    </footer>
</div>
@include('admin.layout.footer')
</body>
</html>
