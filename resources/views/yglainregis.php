
@section('content')
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
  
    <div class="center">
        <h1>Register</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('register.input')}}" method="post">
        @csrf 
        <div class="txt_field">
            <input type="text" name="name" required>
            <label>name</label>
        </div>
        <div class="txt_field">
            <input type="text" name="username" required>
            <label>username</label>
        </div>
        <div class="txt_field">
            <input type="email" name="email" required>
            <label>email</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password" required>
            <label>password</label>
        </div>
        <input class="pass" type="submit" value="Daftar">
      </form>
</body>
</html>   <button class="ml-auto btn bg-white text-muted fas fa-angle-down" type="button" data-toggle="collapse"
                    data-target="#comments" aria-expanded="false" aria-controls="comments"></button>