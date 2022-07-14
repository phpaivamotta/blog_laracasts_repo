<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Visitor;
use Livewire\Component;

class DeletePost extends Component
{
    public $modal = false;

    public Post $currentPost;

    public function mount()
    {
        $this->currentPost = new Post;
    }

    public function render()
    {
        return view('livewire.delete-post', [
            'posts' => Post::with(['comment', 'likeCounter'])->paginate(50),
            'visitors' => Visitor::all()
        ]);
    }

    public function confirmDelete(Post $post)
    {
        $this->currentPost = $post;

        $this->modal = true;
    }

    public function destroy()
    {
        $this->currentPost->delete();

        $this->modal = false;
    }

    public function toggleHide(Post $post)
    {
        $this->currentPost = $post;

        $this->currentPost->update(['hide' => ! $this->currentPost->hide]);

        ddd($this->currentPost->hide);
    }
}
