<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Usahawan Amanah</title>
    <meta name="description" content="Admin Usahawan Amanah">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Style in here -->
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<body>
    <!-- Sidebar -->
    @include('includes.sidebar')

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        
        <!-- Navbar -->
        @include('includes.navbar')

        <!-- Content -->
        <div class="content">
            <!-- Content Dashboard -->
            @yield('content')
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->

    <!-- script in here -->
    @stack('before-style')
    @include('includes.script')
    @stack('after-style')
    @yield('script')
    @yield('modal')
    @yield('wilayah')
</body>
</html>
