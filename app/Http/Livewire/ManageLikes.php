<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ManageLikes extends Component
{

    public $post;

    public function mount($postId)
    {
        $this->post = Post::find($postId);
    }

    public function like(Post $post)
    {
        if ($post->liked()) {
            $post->unlike();
        } else {
            $post->like();
        }

        $this->post = Post::find($this->post->id);
    }

    public function render()
    {
        return view('livewire.manage-likes');
    }
}
