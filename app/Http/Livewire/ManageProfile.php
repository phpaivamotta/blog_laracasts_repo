<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class ManageProfile extends Component
{
    public User $user;
    public $showConfirmDeleteModal = false;

    public function confirmDelete()
    {
        $this->showConfirmDeleteModal = true;
    }

    public function destroy()
    {
        // because this user is being deleted, and the laravel-likeable package does not seem to have a cascadeOnDelete functionality, we need to find all the posts the user liked and unlike them (unliking deletes the like entries from the tables created by the package).
        $userLikes = $this->user->likes;

        // check to see if the user liked any posts at all before performing operations
        if ($userLikes->count()) 
        {
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
                $postUserLiked->unlike($this->user->id);
            }
        }

        // now we can delete the user and redirect
        $this->user->delete();

        return redirect('/')->with('success', 'Perfil deletado :(');
    }

    public function render()
    {
        return view('livewire.manage-profile');
    }
}
