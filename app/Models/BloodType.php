<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{

    protected $fillable = [
        'name'
        ];

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function DonationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

}
