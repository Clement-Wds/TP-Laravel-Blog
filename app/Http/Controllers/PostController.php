<?php

namespace App\Http\Controllers;

use App\Models\Post as Post;
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

    public function formEditPost(int $id){
        $post = Post::all()->where('id', $id)->first();

        if(auth()->check()){
            return view('post/editPost', [
                'post' => $post
            ]);
        }
        flash('Vous devez être connecté pour accéder à cette page !')->error();
        return redirect('/connexion');
    }

    public function editPost(){
        if(auth()->check()){
            $post = Post::where('id', request('id'))->firstOrFail();
            $user = auth()->user();
            if($post->user_id == $user->id){
                request()->validate([
                    'title' => ['required'],
                    'content' => ['required'],
                    'status' => ['required']
                ]);

                $photo = 'https://cdn.pixabay.com/photo/2021/01/14/20/32/fish-5917864_1280.jpg';

                $post->title = request('title');
                $post->content = request('content');
                $post->photo = $photo;
                $post->status = request('status');
                $post->save();

                flash('Votre publication a été modifée avec succès')->success();
                return redirect('/profile');
            }
            flash('Désolé, vous ne pouvez pas modifier cette publication car elle ne vous appartient pas !')->error();
            return redirect('/');
        }
        flash('Vous devez être connecté pour accéder à cette page !')->error();
        return redirect('/connexion');
    }

    public function deletePost(int $id){
        $post = Post::all()->where('id', $id)->first();
        $post->delete();
        flash('Votre publication a bien été supprimée !');
        return redirect('/profile');   
    }
}
