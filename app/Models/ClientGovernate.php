<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientGovernate extends Model
{

    protected $table = 'client_governorate';
    public $timestamps = true;
    protected $fillable = array('client_id', 'governorate_id');

}
