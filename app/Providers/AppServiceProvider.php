<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Collection::macro('castToCoordinate', function (&$coordinate) {
            $coordinate->latitude = $this['lat'];
            $coordinate->longitude = $this['lon'];
            $coordinate->{'00H'} = $this['dates'][0]->value;
            $coordinate->{'01H'} = $this['dates'][1]->value;
            $coordinate->{'02H'} = $this['dates'][2]->value;
            $coordinate->{'03H'} = $this['dates'][3]->value;
            $coordinate->{'04H'} = $this['dates'][4]->value;
            $coordinate->{'05H'} = $this['dates'][5]->value;
            $coordinate->{'06H'} = $this['dates'][6]->value;
            $coordinate->{'07H'} = $this['dates'][7]->value;
            $coordinate->{'08H'} = $this['dates'][8]->value;
            $coordinate->{'09H'} = $this['dates'][9]->value;
            $coordinate->{'10H'} = $this['dates'][10]->value;
            $coordinate->{'11H'} = $this['dates'][11]->value;
            $coordinate->{'12H'} = $this['dates'][12]->value;
            $coordinate->{'13H'} = $this['dates'][13]->value;
            $coordinate->{'14H'} = $this['dates'][14]->value;
            $coordinate->{'15H'} = $this['dates'][15]->value;
            $coordinate->{'16H'} = $this['dates'][16]->value;
            $coordinate->{'17H'} = $this['dates'][17]->value;
            $coordinate->{'18H'} = $this['dates'][18]->value;
            $coordinate->{'19H'} = $this['dates'][19]->value;
            $coordinate->{'20H'} = $this['dates'][20]->value;
            $coordinate->{'21H'} = $this['dates'][21]->value;
            $coordinate->{'22H'} = $this['dates'][22]->value;
            $coordinate->{'23H'} = $this['dates'][23]->value;
            $coordinate->{'24H'} = $this['dates'][24]->value;
        });
    }
}
