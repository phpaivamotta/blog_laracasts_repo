<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class DeleteUser extends Component
{

    public $modalDelete = false;

    public User $currentUser;

    public function mount()
    {
        $this->currentUser = new User;
    }

    public function destroy()
    {
        // because this user is being deleted, and the laravel-likeable package does not seem to have a cascadeOnDelete functionality, we need to find all the posts the user liked and unlike them (unliking deletes the like entries from the tables created by the package).
        $userLikes = $this->currentUser->likes;

        // check to see if the user liked any posts at all before performing operations
        if ($userLikes->count()) {
            $postsIdUserLiked = [];

            // get the liked posts id's
            // the likeable_id is the post id, in our case.
            foreach ($userLikes as $userLike) {
                $postsIdUserLiked[] = $userLike['likeable_id'];
            }

            // find the posts the user liked
            $postsUserLiked = Post::find($postsIdUserLiked);

            // unlike the posts
            foreach ($postsUserLiked as $postUserLiked) {
                $postUserLiked->unlike($this->currentUser->id);
            }
        }

        // now we can delete the user and flash the message
        $this->currentUser->delete();

        $this->modalDelete = false;

        session()->flash('success', 'O usuário foi deletado!');
    }

    public function confirmDelete(User $object)
    {
        $this->currentUser = $object;

        $this->modalDelete = true;
    }


    public function render()
    {
        return view('livewire.delete-user', [
            'users' => User::with(['comments', 'likes'])
                ->where('username', '!=', 'jessicaszklarz')
                ->paginate(50),
        ]);
    }
}
