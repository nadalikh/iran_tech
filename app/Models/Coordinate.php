<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    use HasFactory;
    protected $fillable = [
        'latitude',
        'longitude',
        '00H',
        '01H',
        '02H',
        '03H',
        '04H',
        '05H',
        '06H',
        '07H',
        '08H',
        '09H',
        '10H',
        '11H',
        '12H',
        '13H',
        '14H',
        '15H',
        '16H',
        '17H',
        '18H',
        '19H',
        '20H',
        '21H',
        '22H',
        '23H',
        '24H',

    ];
}
