<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use App\Models\Post as Post;
use Illuminate\Http\Request;

class NewsFeedController extends Controller
{
    public function publicFeed(){
        $posts = Post::all();

        return view('home', [
            'posts' => $posts
        ]);
    }
}
