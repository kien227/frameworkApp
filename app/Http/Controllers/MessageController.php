<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(User $user)
    {
        return view('sendmessage', compact('user'));
    }

    public function showMessInfo(){
        $messages = Message::oldest()->paginate(7);
        return view('receivemessage', compact('messages'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        $request->validate([

            'receiver' => 'required',

            'content' => 'required',

        ]);
        Message::create([
            'sender' => Auth::user()->username,
            'receiver' => $request['receiver'],
            'content' => $request['content'],
        ]);
        if (Auth::user()->role == 'teacher') {
            return redirect()->route('users.index1')
                ->with('success', 'Message sent successfully.');
        } else {
            return redirect()->route('users.index2')
                ->with('success', 'Message sent successfully.');
        }
    }
}
