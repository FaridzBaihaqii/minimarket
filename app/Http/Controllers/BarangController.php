<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Barang $barang)
    {
        //Tampilkan daftar barang
        $data = [
            'barang' => Barang::all()
        ];
        return view('barang.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('barang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Barang $barang)
    {
        //
        $request->validate([
            'nama_barang'=> 'required',
            'barcode' => 'required',
            'foto_barang' => 'required',
        ]);

        $data = new Barang;
        $data->barcode = $request -> barcode;
        $data->nama_barang = $request -> nama_barang;
        $data->foto_barang = $request->foto_barang;
        $data->save();
        // dd($data);
        return redirect()->to('/dashboard/barang')->with('success','berhasil tambah data');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang, Request $request)
    {
        //
        $id_barang = $request->input('id_barang');
        //Hapus 
    $aksi = $barang->where('id_barang',$id_barang)->delete();
    if($aksi):
            //Pesan Berhasil
        $pesan = [
            'success'   => true,
            'pesan'     => 'Data barang berhasil dihapus'
        ];
    else:
            //Pesan Gagal
        $pesan = [
            'success' => false,
            'pesan'     => 'Data gagal dihapus'
        ];
    endif;
    return response()->json($pesan);
    }
}