<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Auth;

trait HasCreatedUpdatedBy
{
    /**
     * Boot the trait and add model event listeners for created_by and updated_by.
     */
    public static function bootHasCreatedUpdatedBy()
    {
        static::creating(function ($model) {
            if (Auth::check()) {
                $model->created_by = Auth::id();
            }
        });

        static::updating(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });
    }

    /**
     * Add fillable properties for created_by and updated_by.
     */
}