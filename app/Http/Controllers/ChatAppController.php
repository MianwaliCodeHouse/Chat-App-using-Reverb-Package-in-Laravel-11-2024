<?php

namespace App\Http\Controllers;

use App\Events\MessagetSent;
use Illuminate\Http\Request;

class ChatAppController extends Controller
{
    public function fireMessage(Request $request)
    {
        MessagetSent::dispatch($request->sender, $request->message);
        return $request->all();
    }
    public function chatroom(Request $request)
    {
        $request->validate([
            'username' => 'required'
        ]);
        $username = $request->username;
        return view('chatroom', ['username' => $username]);
    }
}
