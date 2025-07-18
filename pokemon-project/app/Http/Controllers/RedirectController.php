<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    /**
     * Redirige l'utilisateur en fonction de son rôle après la connexion
     */
    public function redirectUser()
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            // Vérifie s'il s'agit d'un administrateur en utilisant directement la propriété de rôle
            if ($user->role === 'admin') {
                return redirect()->route('admin');
            } else {
                return redirect('/'); // Redirige l'utilisateur régulier vers la page d'accueil
            }
        }
        
        return redirect('/login');
    }
}