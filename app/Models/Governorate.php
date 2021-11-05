<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function clients()
    {
        return $this->morphedByMany(Client::class, 'clientable');
    }

    public function scopeSearch($q)
    {
        return empty(request()->table_search) ? $q : $q->where('name', 'like', '%' . request()->table_search . '%');
    }
}
