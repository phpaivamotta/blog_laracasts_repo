<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class ManageComments extends Component
{

    public $modal = false;
    public $post;
    public $comments;
    public $body;   // body of the comment

    protected $rules = [
        'body' => 'required'
    ];

    public Comment $currentComment;

    public function mount($postId)
    {
        $this->currentComment = new Comment;
        $this->post = Post::find($postId);
        $this->comments = $this->post->comment;
    }

    public function postComment()
    {
        $this->validate();

        $this->post->comment()->create([
            'user_id' => request()->user()->id,
            'body' => $this->body
        ]);

        // reset comment so that text area is empty
        $this->body = '';

        // refresh model
        $this->post = Post::find($this->post->id);
        $this->comments = $this->post->comment;
    }

    public function destroy()
    {
        $this->currentComment->delete();

        $this->modal = false;

        $this->post = Post::find($this->post->id);
        $this->comments = $this->post->comment;
        $this->emit('updateCommentCount');
    }

    public function confirmDelete(Comment $object)
    {
        $this->currentComment = $object;

        $this->modal = true;
    }

    public function render()
    {
        return view('livewire.manage-comments');
    }
}
