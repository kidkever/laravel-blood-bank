<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function client()
    {
        return $this->hasMany(Client::class);
    }

    public function donationRequests()
    {
        return $this->hasMany(DonationRequest::class);
    }

    public function clients()
    {
        return $this->morphedByMany(Client::class, 'clientable');
    }
}
