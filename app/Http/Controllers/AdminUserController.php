<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'Usuário foi deletado');
    }
}
