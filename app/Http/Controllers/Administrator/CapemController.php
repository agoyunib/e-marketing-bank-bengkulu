<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cabang;
use App\Capem;

class CapemController extends Controller
{
    public function index(){
        $capems = Capem::join('cabangs','cabangs.id','capems.cabang_id')->select('nm_cabang','nm_capem')->get();
        $cabangs= Cabang::all();
        return view('backend/administrator/capem.index',compact('capems','cabangs'));
    }

    public function post(Request $request){
        $this->validate($request,[
            'id'   =>  'required',
            'cabang_id'   =>  'required',
            'nm_capem'   =>  'required',
            
        ]);

        Capem::create([
            'id'   => $request->id,
            'cabang_id'   => $request->cabang_id,
            'nm_capem'       =>  $request->nm_capem,
           
        ]);

        return redirect()->route('administrator.capem')->with(['success' =>  'Capem berhasil ditambahkan']);
    }
}
