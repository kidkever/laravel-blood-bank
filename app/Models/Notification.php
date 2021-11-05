<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'donation_request_id');

    public function donationRequest()
    {
        return $this->belongsTo(DonationRequest::class);
    }

    public function clients()
    {
        return $this->morphedByMany(Client::class, 'clientable')->withPivot('is_read');
    }
}
