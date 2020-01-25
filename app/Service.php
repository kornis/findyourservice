<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['service_title', 'service_description','service_lat','service_long','active','map_link'];

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

    public function scopeDistance($query,$latitude,$longitude, $radius )
    {
        if($radius)
        {
            return $query->selectRaw('( 6371 * acos( cos( radians(?) ) *
                               cos( radians( service_lat ) )
                               * cos( radians( service_long ) - radians(?)
                               ) + sin( radians(?) ) *
                               sin( radians( service_lat ) ) )
                             ) AS distance', [$latitude, $longitude, $latitude])
            ->havingRaw("distance <= ?", [$radius]);
        }
        else
        {
            return $query->selectRaw('( 6371 * acos( cos( radians(?) ) *
                               cos( radians( service_lat ) )
                               * cos( radians( service_long ) - radians(?)
                               ) + sin( radians(?) ) *
                               sin( radians( service_lat ) ) )
                             ) AS distance', [$latitude, $longitude, $latitude]);
        }
    }
}
