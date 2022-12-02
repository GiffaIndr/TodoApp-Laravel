<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/stylist.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<style>
  a:hover{
   color: white !important;
 }
</style>
<body class="" style="background-img: url('{{asset('assets/img/bglogin.jpg')}}')">
   @if(Auth::check())
   <header>
    
    <a   href="/todo/" class="logo">Todo<span>App</span></a>
    <div class="bx-menu"  id="menu-icon"></div>

    <ul class="navlist">
        <li><a href="/todo/create">create</a></li>
    </ul>

    <div class="h-btn">

        <a class="mode" href="/logout">logout</a>
    </div> 
</header> 
       <div>
                  <div class="wave"></div>
                  <div class="wave"></div>
                  <div class="wave"></div>
              </div>
      
                   
                    @endif
              
    @yield('content')
</body>

<script src="{{asset('assets/js/index.js')}}"></script>
</html>