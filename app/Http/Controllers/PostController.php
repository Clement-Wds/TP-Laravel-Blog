<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function formCreatePost(){
        if(auth()->user()){
            return view('post/createPost');
        }
        flash('Vous devez être connecté pour accéder à cette page !')->error();
        return redirect('/connexion');
    }

    public function createPost(){
        request()->validate([
            'title' => ['required'],
            'content' => ['required'],
            'status' => ['required']
        ]);

        $photo = 'https://cdn.pixabay.com/photo/2021/01/14/20/32/fish-5917864_1280.jpg';

        auth()->user()->posts()->create([
            'title' => request('title'),
            'content' => request('content'),
            'status' => request('status'),
            'photo' => $photo
        ]);

        flash('Votre post a été publié avec succès !')->success();
        return back();
    }

    public function editPost(){

    }

    public function deletePost(){
        
    }
}
