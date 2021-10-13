<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_age', 'blood_type_id', 'client_id', 'hospital_name', 'hospital_address', 'city_id', 'patient_phone', 'longitude', 'latitude', 'additional_notes');

    public function bloodType()
    {
        return $this->belongsTo('BloodType');
    }

    public function client()
    {
        return $this->belongsTo('Client');
    }

    public function city()
    {
        return $this->belongsTo('City');
    }

    public function notification()
    {
        return $this->hasOne('Notification');
    }

}