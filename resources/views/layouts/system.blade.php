<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title : "RECARGAS" }}</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/niceadmin.css">
    <link href="
https://cdn.jsdelivr.net/npm/choices.js@10.2.0/public/assets/styles/choices.min.css
" rel="stylesheet">


<script src="/js/decimal.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/niceadmin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/r-2.5.0/datatables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/r-2.5.0/datatables.min.js"></script>

</head>
<body>
    <main style="padding : 20px;margin-top:60px ; transition: all 0.3s">
        <div class="container-fluid px-0" data-layout="container">
            @include('layouts/sidebar')
            @include('layouts/topbar')
            @yield('content')
        </div>
      </main>

</body>
</html>
