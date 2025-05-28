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

        if (isset($data['feature_image']) && $data['feature_image']->isValid()) {
            $file = $data['feature_image'];
            $imageNameFeature = time() . '.' . $file->getClientOriginalExtension();
            $imagePath = Storage::disk('public')->putFileAs('blogs', $file, $imageNameFeature);
            $data['feature_image'] = $imagePath; // Save relative path
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

           // Image
            if (!empty($data['image'])) {
                $file = $data['image'];
                $imageName = time() . '.' . $file->getClientOriginalExtension();
                $path = Storage::disk('public')->putFileAs('blogs', $file, $imageName);
                $data['image'] = $path; // Save relative path
            }         
            
        }
        if (isset($data['feature_image']) && $data['feature_image']->isValid()) {
            // Delete old image if exists
            if ($blog->feature_image && Storage::disk('public')->exists($blog->feature_image)) {
                Storage::disk('public')->delete($blog->feature_image);
            }

           // Image
            // Feature Image
            if (!empty($data['feature_image'])) {
                $featureFile = $data['feature_image'];
                $featureImageName = time() . '_feature.' . $featureFile->getClientOriginalExtension();
                $featureImagePath = Storage::disk('public')->putFileAs('blogs', $featureFile, $featureImageName);
                $data['feature_image'] = $featureImagePath;
            }     
            
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