<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
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
    public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Création de l'utilisateur
    $user = User::create([
        'name' => $request->name,
        'email' => strtolower($request->email),
        'password' => Hash::make($request->password),
    ]);

    // Assigner un rôle à l'utilisateur (par exemple, "student")
    $role = \App\Models\Role::where('label', 'student')->first(); // Rechercher le rôle "student"
    $user->id_role = $role->id_role; // Attribuer le rôle à l'utilisateur
    $user->save();

    // Connexion automatique de l'utilisateur
    Auth::login($user);

    return redirect(route('dashboard'));
}

}