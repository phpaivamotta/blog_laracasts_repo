<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Visitor;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::with(['comment', 'likeCounter'])->paginate(50),
            'visitors' => Visitor::all()
        ]);
    }

    
    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        // validate input for new post
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        // append the user_id value to the $attributes array so that a new Post instance can be created
        $attributes['user_id'] = auth()->id();
        // store thumbnail file path in $attributes array
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        // instantiate a new post
        $post = Post::create($attributes);

        return redirect('posts/'.$post->slug)->with('success', 'Seu post foi criado!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        // validate input for new post
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
        ]);
        
        if(isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        // this 'update' method is not the same as the one created, it belogs to the model class
        $post->update($attributes);

        // return back()->with('success', 'Post updated!');
        return redirect('posts/'.$post->slug)->with('success', 'Post atualizado!');

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deletado!');
    }
}
