<!DOCTYPE html>
<html>
@include('admin.layout.header')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('admin.layout.navbar')
    @include('admin.layout.sidebar')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <strong>Const Tech &copy; 2020 <a href="#">جميع الحقوق محفوظة</a>.</strong>
    </footer>
</div>
@include('admin.layout.footer')
</body>
</html>
