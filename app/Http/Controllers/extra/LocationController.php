<?php

namespace App\Http\Controllers\extra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Location;
class LocationController extends Controller
{
    public function getState(){

    }
    public function getCity($state){
     $city= Location::select('district')->where('state',$state)->get();
     $html="";
     foreach ($city as $ct):
         $html.="<option value='".$ct->district."'>".$ct->district."</option>";
     endforeach;
     echo $html;
    }
}
