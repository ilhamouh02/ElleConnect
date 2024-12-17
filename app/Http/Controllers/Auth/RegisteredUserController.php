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
        // Valider les données de la requête
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            // Supprimez la validation pour le rôle ici
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
        ]);

        // Assigner le rôle "Étudiant" par défaut
        
        $defaultRole = Role::where('label', 'Etudiant')->first(); // Assurez-vous que le label correspond à votre base de données
        if ($defaultRole) {
            $user->id_role = $defaultRole->id_role; // Attribuer le rôle à l'utilisateur
        } else {
            // Gérer le cas où le rôle "Étudiant" n'existe pas
            return redirect()->back()->withErrors(['role' => 'Le rôle "Étudiant" n\'existe pas.']);
        }
        
        $user->save();

        // Connexion automatique de l'utilisateur
        Auth::login($user);

        return redirect(route('dashboard'));
    }
}
