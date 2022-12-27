<?php

namespace App\Http\Controllers;

use App\Models\Coordinate;
use Illuminate\Support\Facades\Log;

class msApiController extends Controller
{

    private function sendRequest($lat, $lon, $format){
        $client = new \GuzzleHttp\Client();
        try {
            $req = $client->get("https://" . config('msApi.username') . ":" . config('msApi.password') .
                "@api.meteomatics.com/2022-12-26T00:00:00ZP1D:PT1H/t_2m:C/" . $lat . "," . $lon . "/".$format);
        }catch (\Exception $e){
            Log::error("Error in calling api : " . $e);
        }
        if (isset($req))
            return $req;
    }

    public function temperature24H($lat, $lon, $format){

        //Convert the json to object
        $req = $this->sendRequest($lat, $lon, $format);

        $content = $req->getBody()->getContents();
        if($format == "json") {
            //Casting collection to coordinate eloquent object
            $content = json_decode($content);
            $collection = collect($content->data[0]->coordinates[0]);
            $coordinate = new Coordinate();
            $collection->castToCoordinate($coordinate);
            $coordinate->save();
        }
        return $content;
    }
    public function getAllTemperature(){
        dd(Coordinate::all());
    }
}
