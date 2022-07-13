<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class DeleteComment extends Component
{

    public $modal = false;
    public $post;
    public $comments;

    public Comment $currentComment;

    public function mount($postId)
    {
        $this->currentComment = new Comment;
        $this->post = Post::find($postId);
        $this->comments = $this->post->comment;
    }

    public function destroy()
    {
        $this->currentComment->delete();

        $this->modal = false;

        //     $object->delete();
        //     $this->modal = false;
        $this->post = Post::find($this->post->id);
        $this->comments = $this->post->comment;
        $this->emit('updateCommentCount');
    }

    public function confirmDelete(Comment $object)
    {
        $this->currentComment = $object;

        $this->modal = true;
    }

    // public function render()
    // {
    //     return view('livewire.delete-post', [
    //         'posts' => Post::with(['comment', 'likeCounter'])->paginate(50),
    //         'visitors' => Visitor::all()
    //     ]);
    // }

    // public $modal = false;
    // public $post;
    // public $comments;

    // public function mount($postId)
    // {
    //     $this->post = Post::find($postId);
    //     $this->comments = $this->post->comment;
    // }

    // public function destroy(Comment $object)
    // {
    //     $object->delete();

    //     $this->modal = false;
    //     $this->post = Post::find($this->post->id);
    //     $this->comments = $this->post->comment;
    //     $this->emit('updateCommentCount');
    // }

    public function render()
    {
        return view('livewire.delete-comment');
    }
}
