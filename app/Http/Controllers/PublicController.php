<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct()
    {
        
    }

    public function showTop()
    {
        return view('public.top');
    }
    
    public function showHelp()
    {
        return view('public.help');
    }

}
