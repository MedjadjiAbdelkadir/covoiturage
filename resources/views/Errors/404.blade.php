<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Page Not Found-RodeMe</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>

<body>
<div class="container mt-5 pt-5">
    <div class="alert text-center">
       <h1 class="display-3" style="font-size: 60px;font-weight: bold">404</h1>
        <h3 class="display-5">Oops! Page Not Found</h3>
        <p>Sorry, the page you're looking for does not exist,It might have been moved or deleted</p>
        <a href="{{route('home')}}" class="btn btn-primary ">Home</a>
        <a href="" class="btn btn-danger ">Contact Us</a>
    </div>
</div>
</body>

</html>
