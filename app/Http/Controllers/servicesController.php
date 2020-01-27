<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;


class servicesController extends Controller
{

    
//funcion que crea un nuevo servicio, se asignan los datos del form al nuevo objeto y es guardado en la DB.
//No está verificada la conexion a la DB.
    public function store(Request $request)
    {
        $service = new Service($request->All());
        $service->user_id = 1;
        $service->save();
        
        return redirect('/services');
    }

    //Funcion que aplica la formula haversine. se pasan los datos que la funcion usa. Se hace llamado
    //al scope "distance" creado en el model Service.
    public function haversine($latitude, $longitude, $radius, $word){


        $services = Service::select('services.*')->search($word)->distance($latitude, $longitude, $radius)->where('active','=','on')->orderBy('distance','ASC')->get();
        return $services;
        

    }
    //funcion que realiza la busqueda de servicios segun una palabra clave del titulo de cada servicio.
    //dependiendo del valor del radio de busqueda, se aplica la logica correspondiente.
    //en caso de no encontrar servicios, se da aviso en la vista.
    public function searchService(Request $request)
    {

        $lat = $request->get('local_lat');
        $long = $request->get('local_long');
        $radius = $request->get('radius');
        $word = $request->get('busqueda');
        //se valida que hayamos obtenido nuestras coordenadas para realizar la busqueda y el calculo de distancia a nosotros.
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

    //funcion que nos devuelve todos los servicios creados al momento
    //al ser una prueba no está paginada la cantidad de datos a mostrar.
    public function getAllServices()
    {

       $services = Service::All();
       return view('abmServicios')->with('data',$services);
     
    }

    //funcion que devuelve el servicio elegido para ver los datos del mismo.
    public function showService($id)
    {
        $service = Service::where('id','=',$id)->first();
        return view('showService')->with('service',$service);
    }
//funcion que se encarga de mostrar la vista para modificar datos de un servicio en particular a partir de su id
    public function modifyService($id)
    {
        $service = Service::find($id);
        return view('modificarServicio')->with('service',$service);
    }

    //funcion que se encarga de buscar el servicio a borrar mediante su ID
    public function deleteService($id)
    {
        Service::destroy($id);
        return redirect('/services');
    }
    //funcion que guarda los datos modificados del servicio.
    public function saveUpdates(Request $request,$id)
    {
        $service = Service::find($id);
    
        if(!$request->active)
        {
            $service->active = "off";
        }
        $service->fill($request->All());
        $service->save();
        return redirect('/services');
    }
}
