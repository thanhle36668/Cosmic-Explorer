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
            'slug' => $request->sender_email,
            'sender_email' => $request->sender_email,
            'message' => $request->message,
            'status' => 0
        ];

        Messages::create($message);
        return redirect('/')->with('success-message', 'Your message has been sent. Thank you!');
    }

    public function messages()
    {
        $data = [
            'messages' => Messages::orderBy('id', 'desc')->paginate(6)
        ];
        return view('admin/messages/all-message')->with($data);
    }

    public function editMessage($id)
    {
        $data = [
            'details_message' => Messages::find($id)
        ];
        return view('admin/messages/details-message')->with($data);
    }

    public function replyMessage(Request $request)
    {
        $message = [
            'time_reply_message' => $request->time_reply_message,
            'reply_message' => $request->reply_message,
            'status' => $request->status,
            'replied_by' => $request->replied_by
        ];

        Messages::where('id', $request->id)->update($message);
        return redirect()->route('admin.messages')->with('success-reply-message', 'You have successfully replied to the message.');
    }

    public function deleteMessage($id)
    {
        Messages::where('id', $id)->delete();
        return redirect()->route('admin.messages')->with('success-delete-message', 'You have deleted successfully.');
    }

    public function searchMessage(Request $request)
    {
        $data = [
            'search_message' => Messages::where('sender_email', 'LIKE', '%' . $request->search_email . '%')->orderBy('id', 'desc')->get()
        ];

        return view('admin/messages/search-message')->with($data);
    }
}
