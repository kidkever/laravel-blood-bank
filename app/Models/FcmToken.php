<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcmToken extends Model
{
    use HasFactory;

    protected $table = 'fcm_tokens';
    public $timestamps = true;
    protected $fillable = array('token', 'platform', 'client_id');

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
