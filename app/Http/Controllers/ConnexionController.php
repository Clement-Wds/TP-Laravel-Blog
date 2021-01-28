<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function form(){
        return view('user/connexion');
    }

    public function connexion(){
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $result = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);

        if($result){
            flash("vous êtes connectés !")->success();
            return redirect('/');
        }

        flash("Email ou mot de passe incorrect !")->error();
        return back();
    }
}
