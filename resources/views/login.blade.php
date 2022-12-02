
@section('content')
@endsection
<link href="{{asset('assets/css/login.css')}}" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="wrapper">
    <div class="title-text">
       <div class="title login">
          Login Form
       </div>
       
       <div  class="title signup"> 
        <a href="/register">
        signup
        </a>
       </div>
    </div>
    <div class="form-container">
       <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Todo</label>
          <label for="signup" class="slide signup">App</label>
          <div class="slider-tab"></div>
       </div>
       <div class="form-inner">
          <form action="{{route('login.auth')}}" method="post" class="login">
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
            <div class='box'>
                <div class='wave -one'></div>
                <div class='wave -two'></div>
                <div class='wave -three'></div>
              </div>
              <div class="field">
                <input type="text" name="username" placeholder="username" required>
             </div>
      <div class="field">
                <input type="email" name="email" placeholder="Email Address" required>
             </div>
             <div class="field">
                <input type="password" name="password" placeholder="Password" required>
             </div>
             <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" value="Login">
             </div>
             <div class="signup-link">
                Not a member? <a href="/register">Signup now</a>
             </div>
          </form>
          
       </div>
    </div>
 </div>
