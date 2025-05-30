<?php

namespace App\Services\BlogCategory;

use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogCategoryService{

    public function index()
    {
        return BlogCategory::latest()->get();
    }

    public function store(array $data)
    {
        $data['slug'] = Str::slug($data['name']);
        $data['created_by'] = auth()->id();
        return BlogCategory::create($data);
    }

    public function update(BlogCategory $blogCategory, array $data)
    {
        $data['slug'] = Str::slug($data['name']);
        $data['updated_by'] = auth()->id();
        $blogCategory->update($data);
        return $blogCategory;
    }

    public function destroy(BlogCategory $blogCategory)
    {
        return $blogCategory->delete();
    }
}