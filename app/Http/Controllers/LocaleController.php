<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($locale)
    {
        // Validate the locale against your supported locales.
        // Store the selected locale in the session.
        if (in_array($locale, array_keys(config('languages'))))
            session(['locale' => $locale]);
    
        return redirect()->back(); // Redirect to the previous page or any desired location.
    }
}
