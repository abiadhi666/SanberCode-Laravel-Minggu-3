<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Date;

class PertanyaanController extends Controller
{
   
    public function index()
    {
        $title = 'Data Pertanyaan';
        $pertanyaan = DB::table('pertanyaan')->get();
        return view('pertanyaan.index', compact('title', 'pertanyaan'));
    }

    
    public function create()
    {
        $title = 'Tambah Pertanyaan';
        return view('pertanyaan.create', compact('title'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        DB::table('pertanyaan')->insert([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        return redirect('/pertanyaan')->with('status', 'Pertanyaan Berhasil Ditambahkan!');
    }

 
    public function show($id)
    {
        $title = 'Detail Pertanyaan';
        $p = DB::table('pertanyaan')->where('id', $id)->first();
        return view('pertanyaan.show', compact('title', 'p'));
    }

    public function edit($id)
    {
        $title = 'Perbaharui Pertanyaan';
        $p = DB::table('pertanyaan')->where('id', $id)->first();
        return view('pertanyaan.edit', compact('title', 'p'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        DB::table('pertanyaan')->where('id', $id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'updated_at' => new DateTime()
        ]);

        return redirect('/pertanyaan')->with('status', 'Pertanyaan Berhasil Diperbaharui!');
    }

    public function destroy($id)
    {
        DB::table('pertanyaan')->where('id', $id)->delete();

        return redirect('/pertanyaan')->with('status', 'Pertanyaan berhasil dihapus');
    }
}
