<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Loclog extends Model
{
    protected $fillable=['countryName','countryCode','regionCode','regionName','cityName','zipCode','isoCode','postalCode','latitude','longitude','metroCode','areaCode','driver','ip'];
}
