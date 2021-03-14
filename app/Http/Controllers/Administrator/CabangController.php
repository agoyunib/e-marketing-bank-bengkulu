<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cabang;
class CabangController extends Controller
{
    public function index(){
        $cabangs = Cabang::all();
        return view('backend/administrator/cabang.index',compact('cabangs'));
    }

    public function post(Request $request){
        $this->validate($request,[
            'id'   =>  'required',
            'nm_cabang'   =>  'required',
            
        ]);

        Cabang::create([
            'id'       =>  $request->id,
            'nm_cabang'       =>  $request->nm_cabang,
           
        ]);

        return redirect()->route('administrator.cabang')->with(['success' =>  'Cabang berhasil ditambahkan']);
    }
}
