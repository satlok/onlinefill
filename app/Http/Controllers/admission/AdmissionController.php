<?php

namespace App\Http\Controllers\admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Admission;
use App\model\Location;
class AdmissionController extends Controller
{
  
    public function index()
    {
       $state=  Location::select('state')->distinct()->get();
        return view('admission.index', compact('state')); 
    }
    public function getadmssion($st,$ct,$cat){
        $res= Admission::where('state',$st)->get();
        //dd($res);
     $html="";
     $html='<table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th class="th-lg">Name</th>
                            <th class="th-lg">State</th>
                            <th class="th-lg">City</th>
                            <th class="th-lg">Category</th>
                            <th>Official Website Link</th>
                        </tr>
                    </thead>
                    <tbody>';
     foreach ($res as $res):
         $html.='<tr>         
                               <th class="red-blue">'. $res->name .'</th>
                               <td><b>'. $res->state .'</b></td>
                               <td class="red-text">'.$res->city .'</td>
                               <td class="purple-text">'.$res->catag.'</td>
                               <td><a class="btn btn-blue btn-sm" href="'.$res->url.'" target="_blank" role="button">View</a></td>
                            </tr>';
     endforeach;
     $html.='</tbody>
                </table>';
     echo $html;
    }
}
