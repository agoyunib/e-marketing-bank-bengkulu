<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Pipeline;
use App\PipelineDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerifikasiRealisasiController extends Controller
{
    public function index()
    {
        $targets = Pipeline::join('users', 'users.id', 'pipelines.ao_id')
            ->join('jenis_produks', 'jenis_produks.id', 'pipelines.jenis_produk_id')
            ->select('pipelines.id as id', 'nm_user', 'nm_jenis_produk', 'nm_target', 'total_target', 'kategori', 'status_realisasi', 'status_usulan', 'pipelines.created_at')
            ->where('status_realisasi', 'berhasil')
            ->orderBy('pipelines.id', 'desc')
            ->get();
        return view('backend/supervisor/verifikasi_realisasi/index', compact('targets'));
    }

    public function verifikasiRealisasi($id)
    {
        DB::beginTransaction();
        try {
            Pipeline::where('id', $id)->update([
                'status_realisasi'    =>  'verified',
                'status_final'          => '1'
            ]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function tolakRealisasi($id)
    {
        DB::beginTransaction();
        try {
            Pipeline::where('id', $id)->update([
                'status_realisasi'      =>  'ditolak',
                'status_final'          =>  '0'
            ]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
