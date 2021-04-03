<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    @include('layouts.main.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @yield('content')
</div>
<!-- ./wrapper -->
@include('layouts.main.foot')
</body>
@stack('page-scripts')
</html>
