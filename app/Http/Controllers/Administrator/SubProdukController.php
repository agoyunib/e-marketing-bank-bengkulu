<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\SubProduk;
Use App\Produk;

class SubProdukController extends Controller
{
    public function index(){
        $subproduks = SubProduk::join('produks','produks.id','sub_produks.produk_id')->select('nm_produk','nm_sub_produk')->get();
        $produks= Produk::all();
        return view('backend/administrator/subproduk.index',compact('subproduks','produks'));
    }

    public function post(Request $request){
        $this->validate($request,[
            'produk_id'   =>  'required',
            'nm_sub_produk'   =>  'required',
            
        ]);

        SubProduk::create([
            'produk_id'   => $request->produk_id,
            'nm_sub_produk'       =>  $request->nm_sub_produk,
           
        ]);

        return redirect()->route('administrator.subproduk')->with(['success' =>  'Subproduk berhasil ditambahkan']);
    }
}
