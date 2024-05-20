<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
class Auth extends Controller
{
    public function register(Request $request)
    {
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'nomor_telepon' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ], [
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'nomor_telepon.max' => 'Nomor telepon tidak boleh lebih dari :max karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat tidak boleh lebih dari :max karakter.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully',
            'data' => $user
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = Str::random(60);
        $user->token = hash('sha256', $token);
        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'data' => [
                'user' => $user,
                'token' => $user->token,
            ]
        ], 200);
    }
}
