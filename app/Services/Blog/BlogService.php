<?php

namespace App\Services\Blog;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogService
{
    public function store(array $data): Blog
    {
        $data['slug'] = Str::slug($data['title']);
        $data['created_by'] = auth()->id();
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('blogs');
        }

        return Blog::create($data);
    }

    public function update(Blog $blog, array $data): Blog
    {
        $data['slug'] = Str::slug($data['title']);
        $data['updated_by'] = auth()->id();
        if (isset($data['image'])) {
            Storage::delete($blog->image);
            $data['image'] = $data['image']->store('blogs');
        }

        $blog->update($data);

        return $blog;
    }

    public function delete(Blog $blog): void
    {
        Storage::delete($blog->image);
        $blog->delete();
    }
}