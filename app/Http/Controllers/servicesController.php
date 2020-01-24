<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Service;
use App\User;


class servicesController extends Controller
{
    public function store(Request $request)
    {
        $service = new Service($request->All());
        $service->user_id = 1;
        $service->save();
        return redirect('/');
    }

    public function haversine($latitude, $longitude, $radius, $word){
       if($radius == "any")
        {
            $services = Service::select('services.*')->search($word)
            ->selectRaw('( 6371 * acos( cos( radians(?) ) *
                               cos( radians( service_lat ) )
                               * cos( radians( service_long ) - radians(?)
                               ) + sin( radians(?) ) *
                               sin( radians( service_lat ) ) )
                             ) AS distance', [$latitude, $longitude, $latitude])->get();
        }
    else
        {

        $services = Service::select('services.*')->search($word)
            ->selectRaw('( 6371 * acos( cos( radians(?) ) *
                               cos( radians( service_lat ) )
                               * cos( radians( service_long ) - radians(?)
                               ) + sin( radians(?) ) *
                               sin( radians( service_lat ) ) )
                             ) AS distance', [$latitude, $longitude, $latitude])
            ->havingRaw("distance <= ?", [$radius])
            ->get();
       }
        
        return $services;
        

    }

    public function searchService(Request $request)
    {

        $lat = $request->get('local_lat');
        $long = $request->get('local_long');
        $radius = $request->get('radius');
        $word = $request->get('busqueda');
        
        if($lat != null && $long != null)
        {
            
            $datos = servicesController::haversine($lat,$long,$radius,$word);
            foreach($datos as $item)
            {
                $item->distance = number_format($item->distance, 2, '.', ' ');
            }
            
            return view('index')->with("data",$datos);
        }
        
        return view('index')->with("err","No pudimos encontrar tu posición. Intente nuevamente.");
    }

    public function getAllServices()
    {

       
       

     
    }
}
