<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::with('post')->latest()->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    public function update($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->approved = !$comment->approved;
        $comment->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công.');
    }

    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect()->back()->with('success', 'Đã xoá bình luận.');
    }
}
