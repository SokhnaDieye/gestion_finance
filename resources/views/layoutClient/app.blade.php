<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{--<link rel="stylesheet" href="{{asset('pageConnexion/style.css')}}">--}}
</head>

<body>
<!-- =============== Navigation ================ -->
<div class="container">
        @include('layoutClient.nav')
    <div class="main">
        @include('layoutClient.topbar')
        @yield('contentClient')

    </div>

</div>
<!-- =========== Scripts =========  -->
<script src="assets/js/main.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
