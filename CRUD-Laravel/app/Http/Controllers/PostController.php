<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
use DB;
// use Illuminate\Support\Facades\DB as FacadesDB;

class PostController extends Controller
{
    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([                        
            'title' => 'required|unique:posts',    
            'body' => 'required'
        ]);
        $query = DB::table('posts')->insert(        
            [
                'title' => $request['title'],      
                'body' => $request['body']        
            ]
        );
        return redirect('/posts') -> with('success','Post Berhasil Disimpan!');
    }
    public function index(){
        $posts = DB::table('posts')->get();     //seperti, select * from posts
        // dd($posts);
        return view('posts.index', compact('posts'));   //compact ini untuk mengambil data dari array
    }
    public function show($id){
        //$post = DB::table('posts') -> where('id', $id) -> get();      //gak pakai get(), melainkan first(). hal ini karena jika pakai get(), akan memunculkan semua datanya dalam bentuk array multi dari 0
        $post = DB::table('posts') -> where('id', $id) -> first();
        return view('posts.show', compact('post'));
    }
    public function edit($id){
        $post = DB::table('posts') -> where('id', $id) -> first();
        return view('posts.edit', compact('post'));
    }
    public function update($id, Request $request){
        $request->validate([                        
            'title' => 'required|unique:posts',     
            'body' => 'required'
        ]);
        $query = DB::table('posts')
                    -> where('id', $id)
                    -> update([
                        'title' => $request['title'],
                        'body' => $request['body']
                    ]);
        return redirect('/posts') ->with('success', 'Berhasil update post!');
    }
    public function destroy($id){
        $query = DB::table('posts') -> where('id', $id) -> delete();
        return redirect('/posts') -> with('success', 'Post berhasil dihapus!');
    }
}
