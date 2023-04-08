<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Farm Management</title>

    <meta name="description" content="Farm Management">
    <meta name="author" content="Codixsol">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Farm Management">
    <meta property="og:site_name" content="Farm Management">
    <meta property="og:description" content="Farm Management">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">


    @include('admin.theme.css')


    @yield('extra-css')

</head>
<body>

<div id="page-container"
     class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
    <!-- Side Overlay-->

    @include('admin.theme.sidebar')


    @include('admin.theme.topnavbar')


    @yield('content')

    @include('admin.theme.footer')

</div>
@include('admin.theme.js')
@yield('extra-js')

</body>
</html>
