<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait UserRelationshipTrait {

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withDefault([
            'name'=>'not found'
        ]);
    }
}