<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class DeleteComment extends Component
{

    public $showDeleteCommentModal = false;
    public $comment;

    public function destroyComment(Comment $comment)
    {
        $comment->delete();

        $this->showDeleteCommentModal = false;
    }

    public function render()
    {
        return view('livewire.delete-comment');
    }
}
