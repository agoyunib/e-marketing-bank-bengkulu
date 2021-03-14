<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Pipeline;
use App\PipelineDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerifikasiTargetController extends Controller
{
    public function index()
    {
        $targets = Pipeline::join('users', 'users.id', 'pipelines.ao_id')
            ->join('jenis_produks', 'jenis_produks.id', 'pipelines.jenis_produk_id')
            ->select('pipelines.id as id', 'users.unit_id', 'nm_user', 'nm_jenis_produk', 'nm_target', 'total_target', 'kategori', 'status_realisasi', 'status_usulan', 'pipelines.created_at')
            ->where('users.unit_id', Auth::user()->unit_id)
            ->where('status_realisasi', 'target')
            ->orderBy('pipelines.id', 'desc')
            ->get();

        $targetsDiTolaks = Pipeline::join('users', 'users.id', 'pipelines.ao_id')
            ->join('jenis_produks', 'jenis_produks.id', 'pipelines.jenis_produk_id')
            ->select('pipelines.id as id', 'users.unit_id', 'nm_user', 'nm_jenis_produk', 'nm_target', 'total_target', 'kategori', 'status_realisasi', 'status_usulan', 'pipelines.created_at')
            ->where('users.unit_id', Auth::user()->unit_id)
            ->where('status_realisasi', 'ditolak')
            ->orderBy('pipelines.id', 'desc')
            ->get();

        return view('backend/supervisor/verifikasi_target/index', compact('targets', 'targetsDiTolaks'));
    }

    public function verifikasiTarget($id)
    {
        DB::beginTransaction();
        try {
            Pipeline::where('id', $id)->update([
                'status_realisasi'    =>  'pipeline'
            ]);
            PipelineDetail::create([
                'user_id'            => Auth::user()->id,
                'pipeline_id'        => $id,
                'status_realisasi'   => 'pipeline'
            ]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function tolakTarget($id)
    {
        DB::beginTransaction();
        try {
            Pipeline::where('id', $id)->update([
                'status_realisasi'    =>  'ditolak'
            ]);
            PipelineDetail::create([
                'user_id'            => Auth::user()->id,
                'pipeline_id'        => $id,
                'status_realisasi'   => 'ditolak'
            ]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
