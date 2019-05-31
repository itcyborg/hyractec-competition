<?php

namespace App\Http\Controllers;

use App\hostel_booking;
use Auth;
use App\hostels;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HostelsController extends Controller
{
    //

    public function index()
    {
        return view('hostels',['hostels'=>hostels::all()]);
    }

    public function bookings()
    {
        $bookings=DB::table('hostels')->join('hostel_bookings','hostels.id','=','hostel_bookings.hostel_id')->where('hostels.author',Auth::user()->id)->get();
        return view('bookings',['bookings'=>$bookings]);
    }

    public function show($id)
    {
        $hostel=hostels::find($id);
        $playlist=hostels::all();
        return view('showhostels',['hostel'=>$hostel,'playlist'=>$playlist]);
    }

    public function getbook($id)
    {
        $hostel=hostels::find($id);
        $playlist=hostels::all();
        return view('bookhostel',['hostels'=>$hostel,'playlist'=>$playlist,'hostel'=>$hostel]);
    }

    public function book(Request $request)
    {
        try {
            ##code here
            $book=new hostel_booking;
            $book->hostel_id=$request->hostel_id;
            $book->name=$request->name;
            $book->email=$request->email;
            $book->contact=$request->contact;
            $book->save();

            $messages='success';
            return redirect('home/hostel/book/'.$book->hostel_id)->with('messages',$messages);
        } catch (Exception $e) {
            $hostel=hostels::find($request->hostel_id);
            $playlist=hostels::all();
            ##handle exceptions here
            $messages['type']='danger';
            $messages['msg']='Booking Failed.'.$e->getMessage();
            $msg[]=(object)$messages;
            return view('bookhostel',['messages'=>$msg,'hostels'=>$hostel,'playlist'=>$playlist,'hostel'=>$hostel]);
        }

    }
    public function store(Request $request)
    {
        if($request->hasFile('hostel'))
        {
            $path = $request->file('hostel')->storePublicly('public/hostels');
            $path=trim($path,'/public');
            $hostel=new hostels;
            $hostel->name=$request->name;
            $hostel->author=Auth::user()->id;
            $hostel->location=$request->location;
            $hostel->longitude=$request->longitude;
            $hostel->latitude=$request->latitude;
            $hostel->description=$request->description;
            $hostel->path=$path;
            $hostel->save();
            return json_encode(['status'=>true,'msg'=>'Success']);
        }
        return json_encode(['status'=>false,'msg'=>'Failed']);
    }
}
