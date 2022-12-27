<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\TestCase;

class callAPI extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_callapi()
    {
        $client = new \GuzzleHttp\Client();
        $lat = 35.71702477564971;
        $lon = 51.34254711410111;
        $format = "json";
        try {
            $req = $client->get("https://" . config('msApi.username') . ":" . config('msApi.password') .
                "@api.meteomatics.com/2022-12-26T00:00:00ZP1D:PT1H/t_2m:C/" . $lat . "," . $lon . "/".$format);
            self::assertTrue($req->getStatusCode() >= 200 && $req->getStatusCode() <= 300, "successful response");
        }catch (\Exception $e){
            self::assertFalse(false, $e->getMessage());
        }
    }
}
