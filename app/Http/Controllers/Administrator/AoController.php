<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unit;
use App\User;

class AoController extends Controller
{
    public function index(){
        $units = Unit::all();
        $user_aos = User::join('units','units.id','users.unit_id')->where('jabatan','ao')
        ->select('users.id as id','no_nrpp','nm_user','nm_unit','email','jabatan','no_hp','status_user')
        ->get();
        return view('backend/administrator/user_ao.index',compact('units','user_aos'));
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

        return redirect()->route('administrator.user_ao')->with(['success' =>  'user berhasil ditambahkan']);
    }
    public function nonaktifkanStatus($id){
        User::where('id',$id)->update([
            'status_user'    =>  '0'
        ]);
        return redirect()->route('administrator.user_ao')->with(['success' =>  'User Berhasil Di Nonaktifkan !!']);
    }

    public function aktifkanStatus($id){
        User::where('id',$id)->update([
            'status_user'    =>  '1'
        ]);
        return redirect()->route('administrator.user_ao')->with(['success' =>  'User Berhasil Di Aktifkan !!']);
    }
}
