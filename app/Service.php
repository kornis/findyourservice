<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['service_title', 'service_description','service_lat','service_long','active','coords'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeSearch($query,$value)
    {
        if($value)
        {
            return $query->where('service_title','LIKE',"%$value%");
        }
    }


}
