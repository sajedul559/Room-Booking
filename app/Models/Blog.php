<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_category_id',
        'title',
        'slug',
        'description',
        'content',
        'image',
        'feature_image',
        'status',
        'created_by','updated_by'
    ];
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
     public function createdBy()
     {
        return $this->belongsTo(user::class,'created_by','id');
     }
     public function updatedBy()
     {
        return $this->belongsTo(user::class,'last_updated_by','id');
     }

}
