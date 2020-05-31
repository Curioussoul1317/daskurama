<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\statistic;
use App\category;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
        $this->middleware('guest');
    }
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
    
    public function index()
    {
        $categories = category::all();
        return view('home')->with('categories', $categories);
    }
}
