@extends('layout')
@section('content')
<style>
button{
border-width: none !important;
    border-style: none !important;
    border-color: none !important;
    border-image: none !important;
}</style>
<div class="jarak"></div>
<div class="wrapper shadow-lg p-3 mb-8 rounded">
    <div class="wrapper shadow-lg p-3 mb-8 rounded bg-white">
        @if (session('notAllowed'))
                <div class="alert alert-success">
                    {{ session('notAllowed') }}
                </div>
                @endif
                @if (session('successUpdate'))
                <div class="alert alert-success">
                    {{ session('successUpdate') }}
                </div>
                @endif
                @if(Session::get('successAdd'))
                <div class="alert alert-danger">
                {{Session::get('successAdd')}}</div>
                @endif
                @if(Session::get('delete'))
                <div class="alert alert-danger">
                {{Session::get('delete')}}</div>
                @endif
                @if(Session::get('done'))
                <div class="alert alert-success">
                {{Session::get('done')}}</div>
                @endif
               
        <div class="d-flex align-items-start justify-content-between">


            <div class="d-flex flex-column  ">
                <div class="h4">  {{ Auth::user()->username}}<span>Todo's</span></div>
                <p class="text-muted text-justify">
                    Create your <span>tasks</span> list
                </p>
                <br>
                <span>
                 
                </span>
            </div>
                  <span class="far fa-user"></span> 
                
            </div>
        </div>
    </div>
    <div class="wrapper shadow-lg p-2 mb-8 rounded bg-white">
        <div class="text-center position-sticky h6">
            <br>
        <p>This <span>is where</span> your <span>todos</span> discover</p>
        </div>
    </div>
</div>
    <div class="wrapper shadow-lg p-3 mb-8 rounded p-3">
        <div class="work border-bottom pt-3">
            <div class="d-flex align-items-center py-2 mt-1">
                
                <div>
                    <span class="fas fa-comment text-muted"></span>
                </div>
                <div class="text-muted "> ..todos</div>
            

            </div>
        </div>
        
        <div id="comments" class="mt-1">
            @foreach($todos as $todo)
            <div class="wrapper shadow-lg p-2 mb- rounded bg-white">
            <div class="comment p-1 d-flex align-items-start justify-content-between">
                <div class="mr-2">
                    @if ($todo['status'] == 1)
                    <span class="far fa-bookmark text-secondary "></span>
                    @else
                    <form action="/todo/completed/{{$todo['id']}}" method="post">
                        @csrf 
                        @method('PATCH')
                        <button type="submit" class="fas fa-check-circle text-primary"></button>
                    </form>
                    @endif
                    {{-- <label class="option">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label> --}}
                </div>
                
                <div class="d-flex flex-column w-75 p-1">
                    
                
                    {{-- Menampilkan data dinamis/data yang diambil dari db pada blade harus menggunakan {{}}--}}
                    <a href="/todo/edit/{{$todo['id']}}" class="text-justify">
                    {{$todo['title']}}
                    </a>
                    <p>{{$todo['description']}}</p>
                    {{--Konsep Ternary : if column status baris ini isinya 1 bakal muncul--}}
                    <p class="text-muted">{{$todo['status'] == 1 ? 'Complated' : 'On-process'}}</p> 
                    {{--Carbon itu package laravel untuk mengelola yang berhubungan dengan date. Tadinya value column 
                        date di db kan bentuknya format 2022-11-22 nah kita pengen ubah bentuk formatnya jadi 22 November, 2022--}}
                        <span class="date">
                        @if ($todo['status'] == 1)
                        selesai pada : {{\Carbon\Carbon::parse($todo ['done_time'])->format('j F, Y')}}
                        @else
                     target selesai : {{\Carbon\Carbon::parse($todo['date'])->format('j, F Y') }} @endif </span></p>
                </div>
                <div class="ml-md-4 ml-0">
                    <a  href="todo/delete/{{$todo['id']}}" class="fas fa-trash-alt p-3 color-red text-muted"></a>
                </div>
                
            </div>
            </div>
            
            <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
            @endforeach
        </div>
    </div>
    @endsection