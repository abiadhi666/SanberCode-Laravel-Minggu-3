<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResgisterController extends Controller
{

        public function form(){
            return view('form');
        }
        public function sapa(Request $request){

        }
        public function sapa_post(Request $request){
            $nama = $request['nama'];
            return "$nama";
        }
}
