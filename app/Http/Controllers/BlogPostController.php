<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BlogPostController extends Controller
{
    public function index(){
        $blogPosts = BlogPost::with('user')->latest()->paginate(3);
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

    public function show(BlogPost $blogPost){
        return Inertia::render('Blog/Show', [
            'blogPost' => $blogPost,
        ]);
    }

    public function ai(Request $request){
        $request->validate([
            'prompt' => 'required|string|min:5',
        ]);
        $prompt = $request->input('prompt');
        $result = Gemini::geminiPro()->generateContent($prompt);
        $content = $result->text();

        return Inertia::render('Blog/Create', [
            'content' => $content,
        ]);
    }

public function edit(BlogPost $blogPost){
        Gate::authorize('update', $blogPost);
        return Inertia::render('Blog/Edit', [
            'blogPost' => $blogPost,
        ]);
    }

    public function update(Request $request, $id){
        $blogPost = BlogPost::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blogPost->update($request->only('title', 'content'));

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $blogPost->image = $path;
        }
        $blogPost->save();
        return redirect()->route('blog.index')->with('status', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $blogPost){
        $blogPost->delete();
        if (Gate::denies('delete', $blogPost)) {
            return redirect()->route('blog.index')->with('status', 'You are not authorized to delete this blog post.');
        }
    }

}
