<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user', 'product')->get();
        return view('admin.comments.index', compact('comments'));
    }

    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('admin-comments.index')->with('success', 'Bình luận đã bị xóa.');
    }
}
