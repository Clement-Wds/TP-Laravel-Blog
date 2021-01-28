<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function form(){
        return view('user/inscription');
    }

    public function createUser(){
        request()->validate([
            'lastname' => ['required'],
            'firstname' => ['required'],
            'email' => ['required'],
            'password' => ['required']
        ]);

        $user = User::create([
            'lastname' => request('lastname'),
            'firstname' => request('firstname'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        flash('Votre compte a été créer avec succès')->success();
        return redirect('/connexion');
    }
}
