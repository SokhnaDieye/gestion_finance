<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title></title>
    <!-- loader-->
    <link href="assetsCli/css/pace.min.css" rel="stylesheet"/>
    <script src="assetsCli/js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="assetsCli/images/favicon.ico" type="image/x-icon">
    <!-- Vector CSS -->
    <link href="assetsCli/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
    <!-- simplebar CSS-->
    <link href="assetsCli/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <!-- Bootstrap core CSS-->
    <link href="assetsCli/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- animate CSS-->
    <link href="assetsCli/css/animate.css" rel="stylesheet" type="text/css"/>
    <!-- Icons CSS-->
    <link href="assetsCli/css/icons.css" rel="stylesheet" type="text/css"/>
    <!-- Sidebar CSS-->
    <link href="assetsCli/css/sidebar-menu.css" rel="stylesheet"/>
    <!-- Custom Style-->
    <link href="assetsCli/css/app-style.css" rel="stylesheet"/>

</head>

<body class="bg-theme bg-theme1">

    @include('layoutClient.nav')
    @include('layoutClient.topbar')
    @yield('contentClient')

<!-- =========== Scripts =========  -->
    <!-- Bootstrap core JavaScript-->
    <script src="assetsCli/js/jquery.min.js"></script>
    <script src="assetsCli/js/popper.min.js"></script>
    <script src="assetsCli/js/bootstrap.min.js"></script>
    <script src="assetsCli/plugins/simplebar/js/simplebar.js"></script>
    <script src="assetsCli/js/sidebar-menu.js"></script>
    <script src="assetsCli/js/jquery.loading-indicator.js"></script>
    <script src="assetsCli/js/app-script.js"></script>
    <script src="assetsCli/plugins/Chart.js/Chart.min.js"></script>
    <script src="assetsCli/js/index.js"></script>
</body>

</html>
