<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\AdmitCard;
use App\model\Job;
use App\model\Result;
use App\model\Loclog;
use App\model\Locuser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware(array('auth:web'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job=Job::select()->orderBy('id','DESC')->limit(10)->get();
        $admit=AdmitCard::select()->orderBy('id','DESC')->limit(10)->get();
        $res= Result::select()->orderBy('id','DESC')->limit(10)->get();
       // dd($admit);
        return view('home', compact('job','admit','res'));
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function privacy()
    {
        return view('privacy');
    }
    public function term()
    {
        return view('term');
    }
    public function notFound()
    {
        return view('notFound');
    }
     public function earn()
    {
        $ip= \Request::ip();
         $data1 = \Location::get($ip);
         
         $data['countryName']=$data1->countryName;
         $data['countryCode']=$data1->countryCode;
         $data['regionCode']=$data1->regionCode;
         $data['regionName']=$data1->regionName;
         $data['cityName']=$data1->cityName;
         $data['zipCode']=$data1->zipCode;
         $data['isoCode']=$data1->isoCode;
         $data['postalCode']=$data1->postalCode;
         $data['latitude']=$data1->latitude;
         $data['longitude']=$data1->longitude;
         $data['metroCode']=$data1->metroCode;
         $data['areaCode']=$data1->areaCode;
         $data['driver']=$data1->driver;
         $data['ip']=$ip;
         $location= new Loclog($data);
         $location->save();
         $id=$location->id;
        return view('earn', compact('id'));
    }
    
    public function postearn(Request $request){
        $req=$request->all();
        $job= new Locuser($req);
        $job->save();
        return view('thanks');
    }
}
