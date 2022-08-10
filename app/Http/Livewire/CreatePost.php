<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $thumbnail;
    public $excerpt;
    public $body;
    public $tempUrl;

    protected $rules = [
        'title' => 'required',
        'thumbnail' => 'required|image|max:30720',
        'slug' => 'required|unique:posts,slug',
        'excerpt' => 'required',
        'body' => 'required',
    ];

    protected $validationAttributes = [
        'thumbnail' => 'miniatura',
        'excerpt' => 'excerto',
        'body' => 'corpo'
    ];

    public function updated($propertyName)
    {
        if ($propertyName == 'thumbnail') {
            try {
                $this->tempUrl = $this->thumbnail->temporaryUrl();
            } catch (\Exception $e) {
                $this->tempUrl = null;
            }
        }
        
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $attributes = $this->validate();

        // append the user_id value to the $attributes array so that a new Post instance can be created
        $attributes['user_id'] = auth()->id();
        // store thumbnail file path in $attributes array
        $attributes['thumbnail'] = $this->thumbnail->store('thumbnails');
        // instantiate a new post
        $post = Post::create($attributes);

        return redirect('posts/' . $post->slug)->with('success', 'Seu post foi criado!');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
