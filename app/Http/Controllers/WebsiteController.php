<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Front Page
     */
    public function frontpage()
    {
        return view('frontpage');
    }

    /**
     * Downloads Page
     */
    public function download()
    {
        return view('downloads');
    }
}
