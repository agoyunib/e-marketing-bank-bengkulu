<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AlatPromosi;

class AlatPromosiController extends Controller
{
    public function index(){
        $alatpromosis = AlatPromosi::all();
        return view('backend/administrator/alatpromosi.index',compact('alatpromosis'));
    }
    public function post(Request $request){
        $this->validate($request,[
            'nm_alat_promosi'   =>  'required',
            
        ]);

       AlatPromosi::create([
            'nm_alat_promosi'       =>  $request->nm_alat_promosi,
            'status_alat_promosi'   =>  '1',
        ]);

        return redirect()->route('administrator.alat_promosi')->with(['success' =>  'Alat Promosi berhasil ditambahkan']);
    }

    public function nonaktifkanStatus($id){
       AlatPromosi::where('id',$id)->update([
            'status_alat_promosi'    =>  '0'
        ]);
        return redirect()->route('administrator.alat_promosi')->with(['success' =>  'alat promosi Berhasil Di Nonaktifkan !!']);
    }

    public function aktifkanStatus($id){
       AlatPromosi::where('id',$id)->update([
            'status_alat_promosi'    =>  '1'
        ]);
        return redirect()->route('administrator.alat_promosi')->with(['success' =>  'alat promosi Berhasil Di Aktifkan !!']);
    }
}
