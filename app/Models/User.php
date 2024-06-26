<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'super_password',
        'roles_id',
        'nomor_handphone',
        'gender',
        'foto_profil',
        'alamat',
        'province_code',
        'city_code',
        'district_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'super_password',
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

    public function isAdmin()
    {
        // Logic to determine if the user is an admin
        return false;
    }

    public function isGov()
    {
        // Logic to determine if the user is a government official
        return false;
    }

    public function isUser()
    {
        // Logic to determine if the user is a regular user
        return true;
    }
    public function getDistrictNameAttribute()
    {
        return District::find($this->district_code)->name ?? 'District Not Found';
    }

    public function getCityNameAttribute()
    {
        return City::find($this->city_code)->name ?? 'City Not Found';
    }

    public function getProvinceNameAttribute()
    {
        return Province::find($this->province_code)->name ?? 'Province Not Found';
    }
}
