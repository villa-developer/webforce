<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        $posts = Post::all()->where('status', 'published');
        return view('index', compact('posts'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('single-post', compact('post'));
    }

    public function post_user(User $user)
    {
        $posts = $user->posts;
        return view('index', compact('posts'));

    }

    public function mis_posts(User $user)
    {
        $posts = $user->posts;
        return view('index', compact('posts'));
    }

    public function tags()
    {
        $tags = Tag::all();
        return view('tags', compact('tags'));
    }

    public function tag($slug)
    {
        $tag  = Tag::where('slug', $slug)->first();
        $posts = $tag->posts;

        return view('index', compact('posts'));
    }
}
