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


    public function doctorInfo()
    {
        return $this->hasOne(DoctorInfo::class, 'doctor_id',  'id')->withDefault();
    }

    public function patiedntInfo()
    {
        return $this->hasOne(PatientInfo::class, 'doctor_id',  'id')->withDefault();
    }
    public function patientInfo()
    {
        return $this->hasOne(PatientInfo::class, 'patient_id',  'id')->withDefault();
    }


    public function doctorShifts()
    {
        return $this->hasMany(DoctorShift::class, 'doctor_id', 'id');
    }

    public function scopeDoctor($query)
    {
        return $query->where('role_id', DOCTOR);
    }
    public function scopePatient($query)
    {
        return $query->where('role_id', PATIENT);
    }
    public function scopeReferral($query)
    {
        return $query->where('is_referral', 1);
    }
    public function doctorFee()
    {
        return $this->hasOne(DoctorFee::class, 'doctor_id', 'id')->where('is_active', 1);
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id')->withDefault([
            'name'=>'not found'
        ]);
    }

}
