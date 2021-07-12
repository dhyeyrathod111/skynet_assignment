<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <!-- Bootstrap CSS -->
    @include('member.include.css')
    <style type="text/css">
        .table-bordered td, .table-bordered th{
            border: 1px solid #e6e6f2
        },
    </style>
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body>
    <div class="preloader" id="preloader" style="display: none;">
        <div class="cssload-loader">
            <div class="cssload-inner cssload-one"></div>
            <div class="cssload-inner cssload-two"></div>
            <div class="cssload-inner cssload-three"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        {{-- {{ dd(session()->has('member_id')) }} --}}
        @include('member.include.header')
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        @include('member.include.sidebar')
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    @include('member.include.js')

    @yield('pagescript')
</body>
 
</html>