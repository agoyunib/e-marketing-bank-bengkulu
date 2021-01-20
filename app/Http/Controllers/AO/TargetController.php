<?php

namespace App\Http\Controllers\AO;

use App\AlatPromosi;
use App\Http\Controllers\Controller;
use App\JenisProduk;
use App\Pipeline;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    public function index(){
        $targets = Pipeline::join('users','users.id','pipelines.user_id')
                            ->join('jenis_produks','jenis_produks.id','pipelines.jenis_produk_id')
                            ->select('nm_user','nm_jenis_produk','nm_target','no_register_target','kategori_target','status_realisasi','status_final');
        return view('backend/ao/target/index',compact('targets'));
    }

    public function add(){
        $jenis = JenisProduk::all();
        $alats = AlatPromosi::all();
        return view('backend/ao/target.add',compact('alats','jenis'));
    }

    public function post(Request $request){
        $this->validate($request,[
            'jenis_produk_id' =>  'required',
            'no_registrasi' =>  'required',
            'nm_terget' =>  'required',
            'alamat' =>  'required',
            'kota' =>  'required',
            'no_hp' =>  'required',
            'kategori_target' =>  'required',
            'target_penambahan_dana' =>  'required',
            'rencana_kunjungan' =>  'required',
            'alat_promosi' =>  'required',
            'total_target' =>  'required',
            'periode_target' =>  'required',
        ]);

        Pipeline::create([
            ''
        ]);
    }
}
