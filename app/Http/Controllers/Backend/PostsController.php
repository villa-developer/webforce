<?php

namespace App\Http\Controllers\Backend;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->posts;
        return view('backend.posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all()->pluck('name', 'id')->toArray();
        return view('backend.posts.create', compact('tags'));
    }

    public function store(Request $request)
    {

        $validator  = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'status' => ['required', Rule::in(['published', 'draft', 'review'])]
        ]);

        $path = '';

        if ($request->has('feature_image'))
        {
            $fileName = $this->getFileName($request->feature_image);
            $path = $request->file('feature_image')
                ->storeAs('posts-media/'.date('Y').'/'.date('m').'/'.'user-'.Auth::user()->id, $fileName, 'public' );
        }

        $params = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => str_slug($request->slug, '-'),
            'status' => $request->status,
            'body' => $request->body,
            'feature_image' => $path
        ];

        $post = Post::create($params);

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        $tags = Tag::all()->pluck('name', 'id')->toArray();
        return view('backend.posts.edit', compact('post', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $validator  = $request->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'body' => 'required',
            'status' => ['required', Rule::in(['published', 'draft', 'review'])]
        ]);
        $path = '';

        if ($request->has('feature_image'))
        {
            $fileName = $this->getFileName($request->feature_image);
            $path = $request->file('feature_image')
                ->storeAs('posts-media/'.date('Y').'/'.date('m').'/'.'user-'.Auth::user()->id, $fileName, 'public' );
        }

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->feature_image = ($path) ? $path : null;

        $post->save();

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json($post, 200);
    }

    public function getFileName($image)
    {
        $fileName = $image->getClientOriginalName();
        $ext = $image->getClientOriginalExtension();
        $fileName = explode('.', $fileName);
        $fileName = $fileName[0];

        $fileName = str_slug($fileName, '-').'.'.$ext;
        return $fileName;

    }
}
