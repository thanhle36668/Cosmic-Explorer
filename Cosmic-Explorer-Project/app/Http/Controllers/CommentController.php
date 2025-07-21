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
        'user_id' => Auth::id(), // null nếu chưa đăng nhập
        'name' => $request->name,
        'email' => $request->email,
        'approved' => false, // hoặc true nếu không cần kiểm duyệt
        ]);

        return back()->with('success', 'Cảm ơn bạn đã bình luận!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
