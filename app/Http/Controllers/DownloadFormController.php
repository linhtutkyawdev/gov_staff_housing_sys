<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class DownloadFormController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        // Increment the download count directly in the database.
        DB::table('download_counts')->increment('count');
        return response()->download("downloads/form.docx", __('messages.FORM_NAME').'.docx');
    }
}
