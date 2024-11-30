<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BlogPostController extends Controller
{
    public function index(){
        $blogPosts = BlogPost::with('user')->latest()->paginate(6);
        return Inertia::render('Blog/index', [
            'blogPosts' => $blogPosts,
        ]);
    }
    public function create(){
        return Inertia::render('Blog/Create');
    }

    public function store( Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);
        $blogPost = Auth::user()->blogPosts()->create($request->only('title', 'content'));
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $blogPost->image = $path;
        }
        $blogPost->save();
        return redirect()->route('blog.index')->with('status', 'Blog post created successfully.');
    }
}
