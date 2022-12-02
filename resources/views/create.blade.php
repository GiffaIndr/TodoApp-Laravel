@extends('layout')
@section('content')
<div class="jarak"></div>
<div class="wrapper shadow-lg p-3 mb-8 rounded">
  
    <form id="create-form" action="{{route("todo.store")}}" method="POST">
        @csrf
        @if ($errors->any())
    <ul>
        @foreach($errors->all() as $error) <li> {{$error}}</li>
        @endforeach
    </ul>
    @endif
    <div class="wrapper shadow-lg p-3 mb-8 rounded">
        
      <h3>Create Todo</h3>
      
      <fieldset>
          <label for="">Title</label>
          <input placeholder="title of todo" name="title" type="text">
      </fieldset>
      <fieldset>
          <label for="">Target Date</label>
          <input placeholder="Target Date" name="date" type="date">
      </fieldset>
      <fieldset>
          <label for="">Description</label>
          <textarea placeholder="Type your descriptions here..." name="description" tabindex="5"></textarea>
      </fieldset>
      <fieldset>
          <button type="submit" id="contactus-submit">Submit</button>
      </fieldset>   
      <fieldset>
          <a href="/todo/" class="btn-cancel btn-lg btn">Cancel</a>
      </fieldset>
    
    </form>
</div>
  </div>
  </div>
  @endsection
