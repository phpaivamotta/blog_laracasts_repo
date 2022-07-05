<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->to(url()->previous() . '#comments')->with('success', 'Comentário deletado!');
    }
}
