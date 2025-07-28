<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'content' => 'required',
        'name' => Auth::check() ? 'nullable' : 'required|string|max:255',
        'email' => Auth::check() ? 'nullable' : 'required|email|max:255',
        'post_id' => 'required|exists:posts,id',
        ]);

        Comment::create([
        'content' => $request->content,
        'post_id' => $request->post_id,
        'user_id' => Auth::id(), // null if not login
        'name' => $request->name,
        'email' => $request->email,
        'approved' => false, 
        ]);

        return back()->with('success', 'Thanks for your comment');
    }

}
