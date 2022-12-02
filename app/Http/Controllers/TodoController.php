<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerAccount(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required|email:dns',
            'username' => 'required|min:1|max:8',
            'password' => 'required|min:1',
            'name' => 'required|min:3',
        ]);

        User::create([
        'name' => $request->name,
         'username' => $request->username, 
         'email' => $request->email, 
         'password' => Hash::make($request->password),
    ]);
    
    return redirect('/')->with('success', 'berhasil menambah akun! silahkan login');
    }
    public function auth(Request $request){
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ],[
            'username.exists' => 'username ini belum tersedia',
            'username.required' => 'username harus diisi',
            'password.required' => 'password harus diisi',
        ]);

        $user =$request->only('username', 'password');
        if(Auth::attempt($user)) {
            return redirect()->route('todo.index');
        }else {
            return redirect()->back()->with('error', 'Gagal login, silahkan cek kembali');
        }
        
        return redirect()->route('todo.index')->with('successAdd', 'Berhasil menambahkan data Todo!');
    
    }
    public function dashboard(){
        // ambil data dari table todos dengan model Todo $todo
        // all() fungsinya untuk mengambil semua data di table
        $todos = Todo::where('user_id', '=', Auth::user()->id)->get();
        //kirim data yang sudah diambil ke file blade / ke file yang menampilkan halaman
        //kirim melalui compact()
        //isi compact sesuaikan dengan nama variable
        return view('dashboard', compact('todos'));
    }

    public function register(){
    return view('register');
    }
    public function index()
    {
    return view('login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //   dd($request->all());
    $request->validate([
        'title' => 'required|min:3',
        'date' => 'required',
        'description' => 'required|min:5',
    ]);
    Todo::create([
        'title' => $request->title,
        'date' => $request->date,
        'description' => $request->description,
        'status' => 0,
        'user_id' => Auth::user()->id,
    ]);
    return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }
    public function complate() {
        return view('dashboard.completed');
    }
    public function updateCompleted($id){
        Todo::where('id','=', $id)->update([
            'status' => 1,
            'done_time' => \Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('done', 'Todo telah selesai dikerjakan');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan halaman input form edit
        //mengambil data satu baris ketika column id pada baris tersebut sama dengan id dari parameter route
        $todo = Todo::where('id', $id)->first();
        //kirim data yang diambil ke file blade dengan compact
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:5',
        ]);
        Todo::where('id', $id)->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);
        return redirect('/todo/')->with('successUpadet', 
        'Data todo berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $todo = Todo::find($id)->delete();
       return redirect()->route('todo.index')->with('delete', 'data  berhasil dihapus');
    }
}

