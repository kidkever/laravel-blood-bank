<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'd_o_b', 'blood_type_id', 'last_donation_date', 'city_id', 'mobile_num', 'password', 'pin_code');
    // protected $guarded = [];


    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function donationRequests()
    {
        return $this->hasMany(DonationRequest::class);
    }

    public function contactUsMessage()
    {
        return $this->hasMany(ContactUs::class);
    }

    public function governorates()
    {
        return $this->morphedByMany(Governorate::class, 'clientable');
    }

    public function notifications()
    {
        return $this->morphedByMany(Notification::class, 'clientable')->withPivot('is_read');
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'clientable');
    }

    public function bloodTypes()
    {
        return $this->morphedByMany(BloodType::class, 'clientable');
    }

    public function fcmTokens()
    {
        return $this->hasMany(FcmToken::class);
    }
}
