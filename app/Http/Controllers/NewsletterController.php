<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Validation\ValidationException;
use App\Services\Newsletter;

class NewsletterController extends Controller
{
    //
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['newsletterEmail' => 'required|email']);

        try {
            $newsletter->subscribe(request('newsletterEmail'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'newsletterEmail' => 'Este email não pode ser adicionado à nossa newsletter.'
            ]);
        }

        return redirect('/')->with('success', 'Parabéns, você se inscreveu na nossa newsletter!');

    }
}
