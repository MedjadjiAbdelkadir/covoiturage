<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$title}}</title>
  <link rel="stylesheet" href="{{asset('font-awesome/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('Auth/css/style.css')}}">
  
</head>

<body class="hold-transition {{$class}}-page">
  <div class="{{$class}}-box" style="width: 500px;">
    <div class="{{$class}}-logo">
      <a href="{{url('index')}}" class="title_site h1"><b>Rode</b><span>Me</span></a>
    </div>

    @yield('content')
    
  </div>

</body>
</html>