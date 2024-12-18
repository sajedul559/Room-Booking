<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use PhpParser\Comment\Doc;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Modules\Appoinment\Entities\DoctorFee;
use Modules\Appoinment\Entities\DoctorShift;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'is_active',
        'photo'
    ];

 
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


   
   
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id')->withDefault([
            'name'=>'not found'
        ]);
    }

}
