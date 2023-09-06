<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home(Request $request)
    {
        $keluhanStatusCounts = Keluhan::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');

        $totalKeluhan = $keluhanStatusCounts->sum();
        $totalBelumDiproses = $keluhanStatusCounts->get('Belum Diproses', 0);
        $totalSedangDiproses = $keluhanStatusCounts->get('Sedang Diproses', 0);
        $totalSudahDiproses = $keluhanStatusCounts->get('Sudah Diproses', 0);

        $user = $request->user();
        return view('dashboard', [
            'user' => $user,
            'total' => $totalKeluhan,
            'total_belum' => $totalBelumDiproses,
            'total_sedang' => $totalSedangDiproses,
            'total_sudah' => $totalSudahDiproses
        ]);
    }

    public function profile()
    {
        $id = auth()->user()->id;

        $user = User::find($id);

        return view('profile', [
            'user' => $user
        ]);
    }

    public function editProfile()
    {
        $id = auth()->user()->id;

        $user = User::find($id);
        return view('edit-profile', [
            'profile' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $validated = $request->validate([
            'name' => 'required',
            'phonenumber' => 'required',
            'email' => 'required|email', // Make sure email is a valid email address.
            'alamat' => 'required',
        ]);

        if ($request->input('password') != null) {
            if ($request->input('password') !== $request->input('password_confirm')) {
                return redirect()->back()->with('error', 'Konfirmasi password tidak sama');
            }
            $user->name = $validated['name'];
            $user->phonenumber = $validated['phonenumber'];
            $user->email = $validated['email'];
            $user->alamat = $validated['alamat'];
            $user->password = bcrypt($request->input('password'));
            $user->save();
        } else {
            $user->name = $validated['name'];
            $user->phonenumber = $validated['phonenumber'];
            $user->email = $validated['email'];
            $user->alamat = $validated['alamat'];
            $user->save();
        }

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
