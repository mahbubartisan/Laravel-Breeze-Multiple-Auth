<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'employee';

    protected $fillable = [
        'firstname',
        'fullname',
        'email',
        'password',
        'status',
        'social_id',
        'social_type'
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function employeeContact()
    {
        return $this->hasMany(EmployeeContact::class);
    }

    public function employeeDetail()
    {
        return $this->hasMany(EmployeeDetail::class);
    }

    public function employeeAttendence()
    {
        return $this->hasMany(EmployeeAttendence::class);
    }
}
