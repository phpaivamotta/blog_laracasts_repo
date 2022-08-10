<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPostForm extends Component
{
    use WithFileUploads;

    public Post $post;
    public $title;
    public $slug;
    public $thumbnail;
    public $excerpt;
    public $body;
    public $tempUrl;

    protected function rules()
    {
        // check to see if $profile_pic is a string because if it is, then it has already been stored into the storage public/storage folder
        if (is_string($this->thumbnail)) {
            return [
                'title' => ['required'],
                'slug' => ['required', 'unique:posts,slug,' . $this->post->id],
                'excerpt' => ['required'],
                'body' => ['required'],
            ];
        } else {
            return [
                'title' => ['required'],
                'thumbnail' => ['required', 'image', 'max:30720'],
                'slug' => ['required', 'unique:posts,slug,' . $this->post->id],
                'excerpt' => ['required'],
                'body' => ['required'],
            ];
        }
    }

    protected $validationAttributes = [
        'thumbnail' => 'miniatura',
        'excerpt' => 'excerto',
        'body' => 'corpo'
    ];

    public function mount()
    {
        $this->title = $this->post->title;
        $this->originalTitle = $this->post->title; // saving to display on view heading
        $this->slug = $this->post->slug;
        $this->thumbnail = $this->post->thumbnail;
        $this->excerpt = $this->post->excerpt;
        $this->body = $this->post->body;
        $this->tempUrl = $this->post->tempUrl;
    }

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

    public function update()
    {
        $attributes = $this->validate();

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = $this->thumbnail->store('thumbnails');
        }

        // this 'update' method is not the same as the one created, it belogs to the model class
        $this->post->update($attributes);

        return redirect('posts/' . $this->post->slug)->with('success', 'Post atualizado!');
    }

    public function render()
    {
        return view('livewire.edit-post-form');
    }
}
