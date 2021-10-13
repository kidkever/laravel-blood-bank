<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model 
{

    protected $table = 'contact_us';
    public $timestamps = true;
    protected $fillable = array('subject', 'message', 'client_id');

    public function clients()
    {
        return $this->hasMany('Client');
    }

}