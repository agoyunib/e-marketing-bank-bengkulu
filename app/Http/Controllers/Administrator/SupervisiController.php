<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unit;
Use App\User;


class SupervisiController extends Controller
{
    public function index(){
        $units = Unit::all();
        $user_supervisis = User::join('units','units.id','users.unit_id')->where('jabatan','supervisi')->get();
        return view('backend/administrator/user_supervisi.index',compact('units','user_supervisis'));
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
            'jabatan' => 'supervisi',
        ]);


        return redirect()->route('administrator.user_supervisi')->with(['success' =>  'Supervisi berhasil ditambahkan']);
    }
}