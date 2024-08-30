<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasFactory ,HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
    'name','email','password','phone','d_o_b','blood_type_id','city_id',
    'last_donation_date','pin_code','api_token'
    ];

    protected $hidden = [
        'password',
        'api_token',
    ];

    public function bloodType()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }
    public function Governorate()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function City()
    {
        return $this->hasMany('App\Models\City');
    }

    public function postFavourite()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function DonationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function Notification()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }

  /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
