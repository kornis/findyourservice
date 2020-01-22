<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['service_title', 'service_description','active','coords'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
