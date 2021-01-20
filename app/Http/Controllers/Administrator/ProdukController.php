<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Produk;

class ProdukController extends Controller
{
    public function index(){
        $produks = Produk::all();
        return view('backend/administrator/produk.index',compact('produks'));
    }

    public function post(Request $request){
        $this->validate($request,[
            'nm_produk'   =>  'required',
            
        ]);

        Produk::create([
            'nm_produk'       =>  $request->nm_produk,
           
        ]);

        return redirect()->route('administrator.produk')->with(['success' =>  'Produk berhasil ditambahkan']);
    }

}
