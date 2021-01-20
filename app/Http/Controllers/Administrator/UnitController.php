<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(){
        $units = Unit::all();
        return view('backend/administrator/unit.index',compact('units'));
    }

    public function post(Request $request){
        $this->validate($request,[
            'nm_unit'   =>  'required',
            'alamat'    =>  'required',
            'kota'      =>  'required',
            'kategori'  =>  'required',
        ]);

        Unit::create([
            'nm_unit'       =>  $request->nm_unit,
            'alamat'        =>  $request->alamat,
            'kota'          =>  $request->kota,
            'kategori'      =>  $request->kategori,
            'status_unit'   =>  '1',
        ]);

        return redirect()->route('administrator.unit')->with(['success' =>  'Unit berhasil ditambahkan']);
    }

    public function nonaktifkanStatus($id){
        Unit::where('id',$id)->update([
            'status_unit'    =>  '0'
        ]);
        return redirect()->route('administrator.unit')->with(['success' =>  'Unit Berhasil Di Nonaktifkan !!']);
    }

    public function aktifkanStatus($id){
        Unit::where('id',$id)->update([
            'status_unit'    =>  '1'
        ]);
        return redirect()->route('administrator.unit')->with(['success' =>  'Unit Berhasil Di Aktifkan !!']);
    }
}
