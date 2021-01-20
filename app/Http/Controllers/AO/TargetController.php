<?php

namespace App\Http\Controllers\AO;

use App\AlatPromosi;
use App\Http\Controllers\Controller;
use App\JenisProduk;
use App\Pipeline;
use App\PipelineDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TargetController extends Controller
{
    public function index(){
        $targets = Pipeline::join('users','users.id','pipelines.ao_id')
                            ->join('jenis_produks','jenis_produks.id','pipelines.jenis_produk_id')
                            ->select('nm_user','nm_jenis_produk','nm_target','no_registrasi','kategori','status_realisasi','status_final')
                            ->get();
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
            'nm_target' =>  'required',
            'alamat' =>  'required',
            'kota' =>  'required',
            'no_hp' =>  'required',
            'kategori_target' =>  'required',
            'target_penambahan_dana' =>  'required',
            'alat_promosi' =>  'required',
            'total_target' =>  'required',
            'periode_target' =>  'required',
        ]);
        DB::beginTransaction();
        try {
            Pipeline::create([
                'jenis_produk_id'   =>  $request->jenis_produk_id,
                'no_registrasi' =>  $request->no_registrasi,
                'nm_target' =>  $request->nm_target,
                'alamat'    =>  $request->alamat,
                'kota'  =>  $request->kota,
                'no_hp' =>  $request->no_hp,
                'kategori'   =>  $request->kategori_target,
                'target_penambahan_dana'    =>  $request->target_penambahan_dana,
                'alat_promosi'  =>  $request->alat_promosi,
                'total_target'  =>  $request->total_target,
                'periode_target'    =>  $request->periode_target,
                'ao_id' =>  Auth::user()->id,
            ]);
            $last = Pipeline::latest()->select('id')->first();
            PipelineDetail::create([
                'pipeline_id'   =>  $last->id,
                'user_id'       =>  Auth::user()->id,
                'status_realisasi'  =>  'target',
            ]);
            DB::commit();
            return redirect()->route('ao.target')->with(['success'   =>  'Target berhasil ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->route('ao.target.add')->with(['error'   =>  'Target gagal ditambahkan']);
            // something went wrong
        }

        return redirect()->route('ao.target')->with(['success'   =>  'Target berhasil ditambahkan']);
    }
}
