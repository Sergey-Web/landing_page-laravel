<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>Unique</title>
    <link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/png">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style-admin.css') }}" rel="stylesheet" type="text/css"> 
<head>
<body>
    <header class="header">
    @yield('header')
    </header>
    <div class="container">
        <div class="wrap-btn-main">
            <a href="{{ route('home') }}" class="btn btn-danger">Main Page</a>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</head>