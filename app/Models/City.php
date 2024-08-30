<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model 
{
    use HasFactory;

    protected $fillable = [
    'name', 
    'governorate_id',
    'governorates_name',
    ];
    
    public function Governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function DonationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

}