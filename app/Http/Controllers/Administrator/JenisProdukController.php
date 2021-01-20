<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\SubProduk;
Use App\Produk;
Use App\JenisProduk;

class JenisProdukController extends Controller
{
    public function index(){
        $jenisproduks = JenisProduk::join('sub_produks','sub_produks.id','jenis_produks.sub_produk_id')->select('nm_sub_produk','nm_jenis_produk')->get();
        $subproduks= SubProduk::all();
        return view('backend/administrator/jenisproduk.index',compact('jenisproduks','subproduks'));
    }

    public function post(Request $request){
        $this->validate($request,[
            'sub_produk_id'   =>  'required',
            'nm_jenis_produk'   =>  'required',
            
        ]);

        JenisProduk::create([
            'sub_produk_id'   => $request->sub_produk_id,
            'nm_jenis_produk'       =>  $request->nm_jenis_produk,
           
        ]);

        return redirect()->route('administrator.jenisproduk')->with(['success' =>  'Jenis produk berhasil ditambahkan']);
    }
}
