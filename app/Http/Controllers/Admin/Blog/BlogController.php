<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Requests\BlogRequest;
use App\Services\Blog\BlogService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

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
        $this->blogService->store($request->validated());
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('backend.blogs.edit', compact('blog', 'categories'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $this->blogService->update($blog, $request->validated());
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $this->blogService->delete($blog);
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
