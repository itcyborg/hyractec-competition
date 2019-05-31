<?php

namespace App\Http\Controllers;

use Auth;
use App\videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        return view('videos',['videos'=>videos::all()->where('public',1)]);
    }

    public function all()
    {
    	# code...
//        xhPQmHgx4onNpjklyuiuPxFju5WNdhF8HZTYNvxk
    	//dd(videos::all());
    }

    public function show($id)
    {
        $video=videos::find($id);
        $link=Storage::url('public/'.$video->path);
        $playlist=videos::all()->where('public',1);
        //update views
        $video->views++;
        $video->save();
        return view('showvideos',['video'=>$video,'link'=>$link,'playlist'=>$playlist]);
    }
    public function store(Request $request)
    {
        if($request->hasFile('video'))
        {
          $path = $request->file('video')->storePublicly('public/videos');
            $path=trim($path,'/public');
          $video=new videos;
          $video->name=$request->name;
          $video->author=Auth::user()->id;
          $video->path=$path;
          $video->views=0;
          $video->tags='';
          $video->public=$request->visibility;
          $video->category=$request->category;
          $video->description=$request->description;
          $video->save();
          return json_encode(['status'=>true,'msg'=>'Success']);
        }
        die('failed');
    }
}
