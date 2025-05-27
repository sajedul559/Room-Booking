<?php

namespace App\Services\Blog;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogService
{
    // public function store(array $data): Blog
    // {
    //     $data['slug'] = Str::slug($data['title']);
    //     $data['created_by'] = auth()->id();
    //     if (isset($data['image'])) {
    //         $data['image'] = $data['image']->store('blogs');
    //     }

    //     return Blog::create($data);
    // }

    public function store(array $data): Blog
    {
        $data['slug'] = Str::slug($data['title']);
        $data['created_by'] = auth()->id();

        if (isset($data['image']) && $data['image']->isValid()) {
            $file = $data['image'];
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('blogs', $file, $imageName);
            $data['image'] = $path; // Save relative path
        }

        return Blog::create($data);
    }


   public function update(Blog $blog, array $data): Blog
    {
        $data['slug'] = Str::slug($data['title']);
        $data['updated_by'] = auth()->id();

        if (isset($data['image']) && $data['image']->isValid()) {
            // Delete old image if exists
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }

            $file = $data['image'];
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('blogs', $file, $imageName);
            $data['image'] = $path; // Save relative path
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