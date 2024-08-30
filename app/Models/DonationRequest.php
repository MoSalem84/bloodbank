<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'patient_age', 'hospital_name', 'hospital_address', 'blood_type_id', 'city_id', 'bags_num', 'details', 'latitude', 'longtude', 'client_id');

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function City()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function Notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

}