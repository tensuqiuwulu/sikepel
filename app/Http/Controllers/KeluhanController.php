<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Keluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = auth()->user()->role;

        if ($role == 'pengguna') {
            $keluhan = Keluhan::where('id_pengaju', auth()->user()->id)->paginate(10);
            if ($request->search != null) {
                $keluhan = Keluhan::where('id_pengaju', auth()->user()->id)->orWhere('judul', 'LIKE', '%' . $request->search . '%')->orWhere('keluhan', 'LIKE', '%' . $request->search . '%')->paginate(10);
            }
        } else {
            $keluhan = Keluhan::paginate(10);
            if ($request->search != null) {
                $keluhan = Keluhan::where('judul', 'LIKE', '%' . $request->search . '%')->orWhere('keluhan', 'LIKE', '%' . $request->search . '%')->paginate(10);
            }
        }

        return view('keluhan.keluhan', [
            'keluhan' => $keluhan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = $request->user();
        $bidang = Bidang::all();
        return view('keluhan.tambah-keluhan', [
            'user' => $user,
            'bidang' => $bidang
        ]);
    }

    public function detailKeluhan($idKeluhan)
    {
        $keluhan = Keluhan::find($idKeluhan);
        if (!$keluhan) {
            abort(404); // Munculkan halaman 404 jika ID tidak ditemukan.
        }

        $bidang = Bidang::all();

        $data = [
            'keluhan' => $keluhan,
            'bidang' => $bidang
        ];

        return view('keluhan.detail-keluhan', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'id_bidang' => 'required',
            'keluhan' => 'required'
        ]);
        $validated['id_pengaju'] = $request->user()->id;
        $validated['status'] = 'Belum Diproses';
        Keluhan::create($validated);
        return redirect('/keluhan/create')->with('success', 'Keluhan berhasil ditambahkan');
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $keluhan = Keluhan::find($id);
        $bidang = Bidang::all();
        return view('keluhan.edit-keluhan', [
            'keluhan' => $keluhan,
            'bidang' => $bidang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $keluhan = Keluhan::find($id);
        $validated = $request->validate([
            'judul' => 'required',
            'id_bidang' => 'required',
            'keluhan' => 'required',
        ]);
        $keluhan['judul'] = $validated['judul'];
        $keluhan['id_bidang'] = $validated['id_bidang'];
        $keluhan['keluhan'] = $validated['keluhan'];
        $keluhan['status'] = $validated['status'];

        $keluhan->save();

        return redirect('/keluhan')->with('success', 'Keluhan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $keluhan = Keluhan::find($id);
        $keluhan->delete();

        return redirect('/keluhan')->with('success', 'Keluhan berhasil terhapus');
    }
}
