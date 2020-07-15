<!DOCTYPE html>
<html>
@include('admin.layout.header')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper admin-mr my-btns">


    @include('admin.layout.navbar')
    @include('admin.layout.sidebar')

    <div class="content-wrapper">
        <section class="content ">
            <div class="container-fluid" dir="rtl">
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
