<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id' , 'token' ,'type'
        ];

        public function Clients()
{
    return $this->belongsTo('App\Models\Client');
}

}



