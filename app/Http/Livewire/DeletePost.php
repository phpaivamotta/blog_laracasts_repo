<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Visitor;
use Livewire\Component;
use Livewire\WithPagination;

class DeletePost extends Component
{
    public $modal = false;

    public Post $currentPost;

    public function mount()
    {
        $this->currentPost = new Post;
    }

    public function destroy()
    {
        $this->currentPost->delete();

        $this->modal = false;
    }

    public function confirmDelete(Post $object)
    {
        $this->currentPost = $object;

        $this->modal = true;
    }

    public function render()
    {
        return view('livewire.delete-post', [
            'posts' => Post::with(['comment', 'likeCounter'])->paginate(50),
            'visitors' => Visitor::all()
        ]);
    }
}
