<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'nomor_telepon' => ['required', 'string', 'max:20'], // Sesuaikan aturan validasi dengan kebutuhan Anda
            'alamat' => ['required', 'string', 'max:255'], // Sesuaikan aturan validasi dengan kebutuhan Anda
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
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

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
