<?php

namespace App\Http\Controllers;

use App\messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    //
    public function store(Request $request)
    {
        $message=new messages;
        $message->name=$request['name'];
        $message->email=$request['email'];
        $message->subject=$request['subject'];
        $message->message=$request['message'];
        return ($message->save()) ? 'success':'failed';
    }
}
