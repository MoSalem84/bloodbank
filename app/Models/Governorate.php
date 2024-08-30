<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{

use HasFactory;

    protected $fillable =[
        'name'
];

    public function Cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}
