<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodTypeClient extends Model
{

    public $timestamps = true;
    protected $fillable = array('client_id', 'blood_types_id');

}
