<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Visitor;
use Livewire\Component;

class ManagePosts extends Component
{
    public $modalDelete = false;
    public $modalHide = false;

    public Post $currentPost;

    public function mount()
    {
        $this->currentPost = new Post;
    }

    public function render()
    {
        return view('livewire.manage-posts', [
            'posts' => Post::with(['comment', 'likeCounter'])->paginate(50),
            'visitors' => Visitor::all()
        ]);
    }

    public function confirmDelete(Post $post)
    {
        $this->currentPost = $post;

        $this->modalDelete = true;
    }

    public function destroy()
    {
        $this->currentPost->delete();

        $this->modalDelete = false;

        session()->flash('success', 'Post deletado!');
    }

    public function confirmHide(Post $post)
    {
        $this->currentPost = $post;

        $this->modalHide = true;
    }

    public function toggleHide()
    {
        $this->currentPost->update(['hide' => !$this->currentPost->hide]);

        $this->modalHide = false;
    }
}
