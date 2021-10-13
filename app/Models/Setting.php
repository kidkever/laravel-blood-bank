<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('about_app', 'notification_setting_text', 'phone', 'email', 'fb_link', 'tw_link', 'insta_link', 'yt_link');

}