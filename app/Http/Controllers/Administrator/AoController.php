<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unit;

class AoController extends Controller
{
    public function index(){
        $units = Unit::all();
        return view('backend/administrator/user_ao.index',compact('units'));
    }

    public function post(Request $request){
        $this->validate($request,[
            'unit_id'   =>  'required',
            'no_nrpp'   =>  'required',
            'nm_user'   =>  'required',
            'email'   =>  'required',
            'no_tlp'   =>  'required',
            
            
        ]);

        User::create([
            'nm_user'       =>  $request->nm_user,
            'unit_id'   =>  'required',
            'no_nrpp'   =>  'required',
            'nm_user'   =>  'required',
            'email'   =>  'required',
            'no_tlp'   =>  'required',
            'jabatan' => 'ao'
        ]);

        return redirect()->route('administrator.user')->with(['success' =>  'user berhasil ditambahkan']);
    }
}
