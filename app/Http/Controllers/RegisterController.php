<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show()
    {
        return view('registration.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phonenumber' => 'required|min:8|max:14',
            'alamat' => 'required',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:8|max:255'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect('/registration')->with('success', 'Registrasi berhasil');
    }
}
