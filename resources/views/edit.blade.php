@extends('layout')
@section('content')
<div class="jarak"></div>
<div class="wrapper shadow-lg p-3 mb-8 rounded">
<div class="container content">  
    <form id="create-form" action="/todo/update/{{$todo['id']}}" method="POST">
        {{-- mengambil dan mengirim data input ke controller yang nantinya diambil oleh Request $request --}}
        @csrf
        {{-- karena di route nya pakai method patch sedangkan attribute method di form cuman bisa post/get.
        jadi yang post nya ditimpa --}}
        @method('PATCH')
        @if ($errors->any())
    <ul>
        @foreach($errors->all() as $error) <li> {{$error}}</li>
        @endforeach
    </ul>
    @endif
    <div class="wrapper shadow-lg p-3 mb-8 rounded">
      <h3>Edit Todo</h3>

      <fieldset>
          <label for="">Title</label>
          <input placeholder="title of todo" name="title" type="text" value="{{$todo['title']}}">
          {{-- atribut value fungsinya untuk memasukan data ke input
          kenapa datanya harus disimpan diinput? karena ini merupakan fitur edit. jika fitur edit belum tentu semua data column diubah
          jadi untuk antisipasinya hal itu, tampilkan dahulu semua data di input baru yang nantinya pengguna yang mementukan data 
          input mana yang diubah  --}}
      </fieldset>
      <fieldset>
          <label for="">Target Date</label>
          <input placeholder="Target Date" name="date" type="date" value="{{$todo['date']}}">
      </fieldset>
      <fieldset>
          <label for="">Description</label>
          {{-- karena textarea tidak termasuk tag input, untuk 
            menampilkan valuenya di pertengahan(sebelum penutup </textarea>) --}}
          <textarea placeholder="Type your descriptions here..." value="{{$todo['description']}}" name="description" tabindex="5"></textarea>
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
  @endsection
