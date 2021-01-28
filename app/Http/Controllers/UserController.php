<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function formProfile(){
        if(auth()->check()){
            $user = auth()->user();
            return view('/user/profile', [
                'user' => $user
            ]);
        }
        flash('Vous devez être connectés pour accéder à cette page !')->error();
        return redirect('/connexion');
    }

    public function formEditProfile(){
        if(auth()->check()){
            $user = auth()->user();
            return view('user/editProfile', [
                'user' => $user
            ]);
        }
        flash('Vous devez être connecté pour accéder à cette page')->error();
        return redirect('/connexion');
    }

    public function editProfile(){
        $user = auth()->user();

        request()->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required']
        ]);

        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $user->save();

        flash('Les modifications ont bien été enregistrées !')->success();
        return redirect('/profile');
    }

    public function formChangePassword(){
        if(auth()->check()){
            $user = auth()->user();
            return view('user/changePassword', [
                'user' => $user
            ]);
        }
        flash('Vous devez être connecté pour accéder à cette page')->error();
        return redirect('/connexion');
    }

    public function changePassword(){
        $user = auth()->user();

        request()->validate([
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        $user->password = bcrypt(request('password'));
        $user->save();

        flash('Votre mot de passe a été modifié avec succès !')->success();
        return redirect('/profile');
    }

    public function deleteUser(){
        $user = auth()->user();
        $user->delete();
        flash('Votre profil a bien été supprimé - Vous pouvez seulement consulter les restaurants et leurs plats - Créez un compte pour pouvoir commander des plats');
        return redirect('/');
    }
}
