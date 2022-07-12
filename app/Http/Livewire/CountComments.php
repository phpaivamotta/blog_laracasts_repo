<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CountComments extends Component
{

    protected $listeners = ['updateCommentCount' => 'refreshPost'];
    public $post;

    public function mount($postId)
    {
        $this->post = Post::find($postId);
    }

    public function refreshPost()
    {
        $this->post = Post::find($this->post->id);
    }

    public function render()
    {
        return view('livewire.count-comments');
    }
}
