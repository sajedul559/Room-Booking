<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryRequest;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->latest()->get();
        return view('backend.blogs.list', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('backend.blogs.create', compact('categories'));
    }

    public function store(BlogRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs');
        }

        Blog::create($data);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('backend.blogs.edit', compact('blog', 'categories'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            Storage::delete($blog->image);
            $data['image'] = $request->file('image')->store('blogs');
        }

        $blog->update($data);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        Storage::delete($blog->image);
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}