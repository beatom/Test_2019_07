<?php

namespace App\Http\Controllers;

use App\Models\Link;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $links = Link::getUserActiveLinks(auth()->user()->id);
        
        return view('home.home', ['links' => $links]);
    }
}
