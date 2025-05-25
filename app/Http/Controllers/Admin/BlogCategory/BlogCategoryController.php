<?php

namespace App\Http\Controllers\Admin\BlogCategory;

use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryRequest;
use App\Services\BlogCategory\BlogCategoryService;

class BlogCategoryController extends Controller
{
    protected $blogCategoryService;

    public function __construct(BlogCategoryService $blogCategoryService)
    {
        $this->blogCategoryService = $blogCategoryService;
    }

    public function index()
    {
        $categories = $this->blogCategoryService->index();
        return view('backend.blog_categories.list', compact('categories'));
    }

    public function create()
    {
        return view('backend.blog_categories.create');
    }

    public function store(BlogCategoryRequest $request)
    {
        $this->blogCategoryService->store($request->validated());
        return redirect()->route('blog-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(BlogCategory $blog_category)
    {
        return view('backend.blog_categories.edit', compact('blog_category'));
    }

    public function update(BlogCategoryRequest $request, BlogCategory $blog_category)
    {
        $this->blogCategoryService->update($blog_category, $request->validated());
        return redirect()->route('blog-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(BlogCategory $blog_category)
    {
        $this->blogCategoryService->destroy($blog_category);
        return redirect()->route('blog-categories.index')->with('success', 'Category deleted successfully.');
    }
}
