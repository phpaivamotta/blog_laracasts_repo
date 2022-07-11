<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class DeleteComment extends Component
{

    public $showDeleteCommentModal = false;
    public $post;
    public $comments;

    public function mount($postId)
    {
        $this->post = Post::find($postId);
        $this->comments = $this->post->comment;
    }

    public function destroyComment(Comment $comment)
    {
        $comment->delete();

        $this->showDeleteCommentModal = false;
        $this->post = Post::find($this->post->id);
        $this->comments = $this->post->comment;
    }

    public function render()
    {
        return view('livewire.delete-comment');
    }
}
