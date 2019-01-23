<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainmenu = "home";
        return view('home')->with(array('mainmenu' => $mainmenu));
    }

    public function showLogin()
    {
        // show the form
        return View::make('login');
    }

    public function doLogin()
    {
// process the form
    }

}
