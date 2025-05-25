<?php

namespace App\Services\Blog;

use App\Models\Blog;
use Illuminate\Support\Str;

class BlogService{

    public function index()
    {
        return Blog::latest()->get();
    }

    public function store(array $data)
    {
        $data['slug'] = Str::slug($data['name']);
        $data['created_by'] = auth()->id();
        return Blog::create($data);
    }

    public function update(Blog $blog, array $data)
    {
        $data['slug'] = Str::slug($data['name']);
        $data['updated_by'] = auth()->id();
        $blog->update($data);
        return $blog;
    }

    public function destroy(Blog $blog)
    {
        return $blog->delete();
    }
}