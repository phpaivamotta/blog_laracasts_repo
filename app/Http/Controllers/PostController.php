<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    //this controller action gets posts (either for the home page as normal, or for the search results)
    public function index()
    {   
        // store current session url so that it can be used in the 'Back to Posts' link in the posts.show view
        Session::put('blog_url', request()->fullUrl());
        
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        ]);
    }

    // This controller action shows a selected post
    // Note the same logic inside the function (Post $post)
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

}
