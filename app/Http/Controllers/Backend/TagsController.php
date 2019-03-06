<?php

namespace App\Http\Controllers\Backend;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('backend.tags.index', compact('tags'));
    }

    public function store(Request $request)
    {

        $validator  = $request->validate([
            'name' => 'required|unique:tags',
        ]);

        if ($request->ajax()){
            $tag = Tag::create(['name' => $request->name, 'slug' => str_slug($request->name)]);
            return response()->json($tag, 200);
        }
    }

    public function show(Tag $tag)
    {
        return $tag;
    }

    public function update(Request $request, Tag $tag)
    {
        $validator  = $request->validate([
            'name'  => ['required', Rule::unique('tags')->ignore($tag->id)],
        ]);

        $tag->name = $request->name;
        $tag->slug = str_slug($request->name);
        $tag->save();

        return $tag;
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json($tag, 200);
    }
}
