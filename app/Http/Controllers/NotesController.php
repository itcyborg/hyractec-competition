<?php

namespace App\Http\Controllers;

use App\notes_category;
use Auth;
use App\notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NotesController extends Controller
{
    //

    public function index()
    {
        $notescat=notes_category::All();
        return view('notes',['notes'=>notes::all(),'notescat'=>$notescat]);
    }

    public function show($id)
    {
        $note=notes::find($id);
        $playlist=notes::where('public',1)->get();
        return view('shownotes',['notes'=>$note,'playlist'=>$playlist]);
    }

    public function download($id)
    {
        if(Auth::user()){
            $note=notes::find($id);
            return response()->download('storage/'.$note->path);
        }
    }
    public function store(Request $request)
    {
        if($request->hasFile('notes'))
        {
            $path = $request->file('notes')->storePublicly('public/notes');
            $path=trim($path,'/public');
            $video=new notes;
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
