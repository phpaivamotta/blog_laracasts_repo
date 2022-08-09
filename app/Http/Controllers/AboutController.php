<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show()
    {
        return view('about.show', [
            'admin' => User::where('username', '=', 'jessicaszklarz')->first()
        ]);
    }

    public function edit()
    {
        return view('admin.about.edit', [
            'about' => About::first()
        ]);
    }

    public function update()
    {
        // validate input for new post
        $attributes = request()->validate([
            'body' => 'required',
        ]);

        $about = About::first();

        // this 'update' method is not the same as the one created, it belogs to the model class
        $about->update($attributes);

        // return back()->with('success', 'Post updated!');
        return redirect('sobre')->with('success', 'Sua bio foi atualizada!');
    }
}
