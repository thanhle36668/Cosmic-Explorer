<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = [
            'sender_name' => $request->sender_name,
            'slug' => $request->sender_name,
            'sender_email' => $request->sender_email,
            'message' => $request->message,
            'status' => 0
        ];

        Messages::create($message);
        return redirect('/')->with('success-message', 'Your message has been sent successfully. Thank you.');
    }

    public function messages()
    {
        $data = [
            'messages' => Messages::get()
        ];
        return view('admin/message/all-message')->with($data);
    }
}
