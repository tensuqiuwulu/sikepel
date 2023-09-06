<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pengguna = User::where('role', 'pengguna')->paginate(10);
        if ($request->search != null) {
            $pengguna = User::where('name', 'LIKE', '%' . $request->search . '%')->orWhere('email', 'LIKE', '%' . $request->search . '%')->where('role', 'pengguna')->paginate(10);
        }
        return view('pengguna.pengguna', [
            'pengguna' => $pengguna
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phonenumber' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);

        $validated['role'] = 'admin';
        $validated['password'] = bcrypt('12345678');

        User::create($validated);
        return redirect('/admin')->with('success', 'Admin berhasil ditambahkan');
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
        $admin = User::find($id);

        return view('admin.edit-admin', [
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = User::find($id);
        $validated = $request->validate([
            'name' => 'required',
            'phonenumber' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'status' => 'required'
        ]);
        $admin['name'] = $validated['name'];
        $admin['phonenumber'] = $validated['phonenumber'];
        $admin['email'] = $validated['email'];
        $admin['alamat'] = $validated['alamat'];
        $admin['status'] = $validated['status'];

        $admin->save();

        return redirect('/admin')->with('success', 'Admin berhasil diedit');
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
