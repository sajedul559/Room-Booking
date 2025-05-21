<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
        protected $fillable = ['name','image_path','created_by','updated_by', 'status'];

    public function createdBy()
     {
        return $this->belongsTo(user::class,'created_by','id');
     }
     public function updatedBy()
     {
        return $this->belongsTo(user::class,'updated_by','id');
     }

}
