<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bidang = Bidang::paginate(10);
        if ($request->search != null) {
            $bidang = Bidang::where('nama_bidang', 'LIKE', '%' . $request->search . '%')->orWhere('kepala_bidang', 'LIKE', '%' . $request->search . '%')->paginate(10);
        }
        return view('bidang.bidang', [
            'bidang' => $bidang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bidang.tambah-bidang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bidang' => 'required',
            'kepala_bidang' => 'required',
            'jumlah_pegawai' => 'required',
            'no_telp' => 'required|max:15',
        ]);
        Bidang::create($validated);
        return redirect('/bidang')->with('success', 'Keluhan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bidang = Bidang::find($id);

        return view('bidang.edit-bidang', [
            'bidang' => $bidang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bidang = Bidang::find($id);
        $validated = $request->validate([
            'nama_bidang' => 'required',
            'kepala_bidang' => 'required',
            'jumlah_pegawai' => 'required',
            'no_telp' => 'required',
        ]);
        $bidang['nama_bidang'] = $validated['nama_bidang'];
        $bidang['kepala_bidang'] = $validated['kepala_bidang'];
        $bidang['jumlah_pegawai'] = $validated['jumlah_pegawai'];
        $bidang['no_telp'] = $validated['no_telp'];

        $bidang->save();

        return redirect('/bidang')->with('success', 'Bidang berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bidang = Bidang::find($id);
        $bidang->delete();

        return redirect('/bidang')->with('success', 'Bidang berhasil terhapus');
    }
}
