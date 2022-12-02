@section('layout')
@section('content')
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
</head>
<body>
    
    <div class="center">
        <h1>login</h1>
    <form action="{{route('login.auth')}}" method="post">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif 
        <div class="txt_field">
            <input type="text" name="username" required>
            <label>username</label>
        </div>
        <div class="txt_field">
            <input type="email" name="email" required>
            <label>Email</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password" required>
            <label>password</label>
        </div>
        <div class"form-check">
            <input class="form-check-input" type="checkbox" value="" id="form1Example" checked/>
            <label class="form-check-label" for="form1Example3">remember me</label>
        </div><br/>
        <div class="pass">forgot password</div>
        <input type="submit" value="Login">
        <div class="signup_link">
            dont have account? <a href="\register"> Signup</a>         
     
      </form>
</body>
</html>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
{{-- @if(session('errors'))
{{session('errors')->first('notAllowed');}}
@endif --}}
@if(Session::get('error'))
<div class="alert alert-danger">
{{Session::get('error')}}</div>
@endif
@if ($errors->any())
<div class="alert alert-warning">
    <div class="alert alert-danger">
    @if (session('errors')->first('notAllowed'))
    {{session('errors')->first('notAllowed');}}
</div>
    @else
    <ul>
        @foreach($errors->all() as $error) <li> {{$error}}</li>
        @endforeach
    </ul>
    @endif
</div>
@endif