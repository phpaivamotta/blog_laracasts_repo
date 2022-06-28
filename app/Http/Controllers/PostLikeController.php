<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class PostLikeController extends Controller
{

    public function like(Post $post)
    {
        if($post->liked())
        {
            $post->unlike();
        }
        else 
        {
            $post->like();
        }

        return redirect()->to(url()->previous() . '#likes');
    }

}
