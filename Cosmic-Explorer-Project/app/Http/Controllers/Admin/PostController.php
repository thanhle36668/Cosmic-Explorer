<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    public function allnews()
    {
        $posts = Post::where('is_published', true)
                 ->latest()
                 ->paginate(5);
        return view('admin.posts.all-news', compact('posts'));

    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $comments = $post->comments()
                     ->where('approved', true)
                     ->latest()
                     ->get();

        return view('admin.posts.news', compact('post', 'comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer|exists:categories,id',
            'is_published' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

// tao slug khong trung khi title cac bai viet giong nhau
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
            while (Post::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }

// xu ly anh:
        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();


        $destination = public_path('uploads/post');
        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

            $file->move(public_path('uploads/post'), $filename);

            $imagePath = 'uploads/post/' . $filename; // <-- lưu đường dẫn để ghi vào DB
        }

        Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'slug' => $slug,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'is_published' => $request->is_published,
            'user_id' => Auth::id(),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Đã tạo bài viết');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required',
            'content' => 'required|string',
            'slug' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer|exists:categories,id',
            'is_published' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'excerpt', 'category_id', 'is_published']);
        $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;

            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }
            $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            // Xoá ảnh cũ nếu có
            if ($post->image && file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }

            // Lưu ảnh mới
           $file = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('uploads/post');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $data['image'] = 'uploads/post/' . $filename;
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Đã cập nhật');
    }

    public function destroy(Post $post)
    {
if ($post->image && file_exists(public_path($post->image))) {
    unlink(public_path($post->image));
}
$post->delete();
    }
}
