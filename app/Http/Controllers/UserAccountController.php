<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function signout(){
        auth()->logout();

        flash('Vous êtes déconnecté')->info();
        return redirect('/connexion');
    }
}
