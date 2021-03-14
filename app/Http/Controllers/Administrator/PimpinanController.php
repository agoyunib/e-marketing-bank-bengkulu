<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unit;
use App\User;

class PimpinanController extends Controller
{
    public function index(){
        $units = Unit::all();
        $user_pimpinans = User::join('units','units.id','users.unit_id')->where('role','pimpinan')
        ->select('users.id as id','no_nrpp','nm_user','nm_unit','role','email','no_hp','status_user')
        ->get();
        return view('backend/administrator/user_pimpinan.index',compact('units','user_pimpinans'));
    }

    public function post(Request $request){
        
        // return $request->all();

        $this->validate($request,[
            'unit_id'   =>  'required',
            'no_nrpp'   =>  'required',
            'nm_user'   =>  'required',
            'email'   =>  'required',
            'password'   =>  'required',
            'no_hp'   =>  'required',
            
            
        ]);

        User::create([
            'nm_user'       =>  $request->nm_user,
            'unit_id'   =>  $request->unit_id,
            'no_nrpp'   =>  $request->no_nrpp,
            
            'email'   =>  $request->email,
            'password'   =>  bcrypt($request->password),
            'no_hp'   =>  $request->no_hp,
            'role' => 'pimpinan',
        ]);


        return redirect()->route('administrator.user_pimpinan')->with(['success' =>  'Pimpinan berhasil ditambahkan']);
    }
     public function nonaktifkanStatus($id){
        User::where('id',$id)->update([
            'status_user'    =>  '0'
        ]);
        return redirect()->route('administrator.user_pimpinan')->with(['success' =>  'User Berhasil Di Nonaktifkan !!']);
    }

    public function aktifkanStatus($id){
        User::where('id',$id)->update([
            'status_user'    =>  '1'
        ]);
        return redirect()->route('administrator.user_pimpinan')->with(['success' =>  'User Berhasil Di Aktifkan !!']);
    }
}
