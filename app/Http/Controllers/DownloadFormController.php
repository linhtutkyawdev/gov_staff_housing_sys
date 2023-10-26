<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DownloadFormController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return response()->download("downloads/form.docx", @config('constants.FORM_NAME').'.docx');
    }
}
