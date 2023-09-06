<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Keluhan;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = auth()->user()->role;

        if ($role == 'pengguna') {
            $keluhan = Keluhan::leftJoin('ulasan', 'keluhan.id', '=', 'ulasan.id_keluhan')
                ->where('keluhan.id_pengaju', auth()->user()->id)
                ->where('keluhan.status', 'Sudah Diproses')
                ->select('keluhan.*', 'ulasan.id_keluhan')
                ->paginate(10);

            if ($request->search != null) {
                $keluhan = Keluhan::leftJoin('ulasan', 'keluhan.id', '=', 'ulasan.id_keluhan')
                    ->where('keluhan.id_pengaju', auth()->user()->id)
                    ->where('keluhan.status', 'Sudah Diproses')
                    ->where(function ($query) use ($request) {
                        $query->where('keluhan.judul', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('keluhan.keluhan', 'LIKE', '%' . $request->search . '%');
                    })
                    ->select('keluhan.*', 'ulasan.id_keluhan')
                    ->paginate(10);
            }
        } else {
            $keluhan = Keluhan::leftJoin('ulasan', 'keluhan.id', '=', 'ulasan.id_keluhan')
                ->where('keluhan.status', 'Sudah Diproses')
                ->select('keluhan.*', 'ulasan.id_keluhan')
                ->paginate(10);

            if ($request->search != null) {
                $keluhan = Keluhan::leftJoin('ulasan', 'keluhan.id', '=', 'ulasan.id_keluhan')
                    ->where('keluhan.status', 'Sudah Diproses')
                    ->where(function ($query) use ($request) {
                        $query->where('keluhan.judul', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('keluhan.keluhan', 'LIKE', '%' . $request->search . '%');
                    })
                    ->select('keluhan.*', 'ulasan.id_keluhan')
                    ->paginate(10);
            }
        }

        return view('ulasan.ulasan', [
            'keluhan' => $keluhan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $keluhan = Keluhan::find($id);
        if (!$keluhan) {
            abort(404); // Munculkan halaman 404 jika ID tidak ditemukan.
        }

        return view('ulasan.tambah-ulasan', compact('keluhan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {
        $validated = $request->validate([
            'id_keluhan' => 'required',
            'ulasan' => 'required',
            'rating' => 'required'
        ]);

        $id_keluhan = $validated['id_keluhan'];
        $ulasanData = [
            'id_keluhan' => $id_keluhan,
            'ulasan' => $validated['ulasan'],
            'rating' => $validated['rating']
        ];

        // Update atau buat ulasan berdasarkan id_keluhan
        Ulasan::updateOrCreate(['id_keluhan' => $id_keluhan], $ulasanData);

        return redirect('/ulasan')->with('success', 'ulasan berhasil ditambahkan');
    }

    public function detailUlasan($idKeluhan)
    {
        $keluhan = Keluhan::find($idKeluhan);
        if (!$keluhan) {
            abort(404); // Munculkan halaman 404 jika ID tidak ditemukan.
        }

        $ulasan = Ulasan::where('id_keluhan', $idKeluhan)->first();
        $data = [
            'keluhan' => $keluhan,
            'ulasan' => $ulasan
        ];

        return view('ulasan.detail-ulasan', compact('data'));
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
            'status' => 'required',
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
