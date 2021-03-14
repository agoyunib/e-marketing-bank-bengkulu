<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Komentar;

class KomentarController extends Controller
{
    public function index(){
        $komentars = Komentar::all();
        return view('backend/administrator/komentar.index',compact('komentars'));
    }

    public function post(Request $request){
        $this->validate($request,[
            'isi_komentar'   =>  'required',
            
        ]);

        Komentar::create([
            'isi_komentar'       =>  $request->isi_komentar,
           
        ]);

        return redirect()->route('administrator.komentar')->with(['success' =>  'komentar berhasil ditambahkan']);
    }

}