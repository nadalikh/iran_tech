<?php

namespace App\Http\Controllers;

use App\Models\Coordinate;
use Illuminate\Support\Facades\Log;

class msApiController extends Controller
{
    /**
     * @param $lat
     * @param $lon
     * @param $format
     * @return \Psr\Http\Message\ResponseInterface|void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * Is used for calling api.
     * It's private because only the msApiController can access this method
     * from it slef.
     */

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

    /**
     * @param $lat
     * @param $lon
     * @param $format
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * Is used to handle response of calling api then send a
     * suitable feedback to user.
     */
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

    /**
     * @return void
     * Watch the coordinate table records.
     * we store temperature in this table for specific coordinate.
     */
    public function getAllTemperature(){
        dd(Coordinate::all());
    }
}
