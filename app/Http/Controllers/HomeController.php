<?php

namespace App\Http\Controllers;

use App\hostels;
use App\notes_category;
use App\Videocategory;
use App\videos;
use App\notes;
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
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        $videos=videos::where('public',1)->orderBy('updated_at', 'desc')->take(6)->get();
        $notes=notes::where('public',1)->orderBy('updated_at', 'desc')->take(6)->get();
        $hostels=hostels::orderBy('updated_at', 'desc')->take(6)->get();
        $videoscat=Videocategory::All();
        $notescat=notes_category::All();

        return view('home',['videocategories'=>$videoscat,'videos'=>$videos,'notescat'=>$notescat,'notes'=>$notes,'hostels'=>$hostels]);
    }
}
