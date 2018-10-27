<?php

namespace App\Http\Controllers\trainer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\model\Profile;

class DashboardController extends Controller
{
    //
     public function __construct()
    {
       $this->middleware(array('auth:web'));
    }
    public function teacher404(){
        //return view('user.dashboard.index', compact('res'));
    }
    public function index(){
        return view('trainer.dashboard.index');
    }
    public function setting(){
        $uid=Auth::user()->id;
        $profile=User::where('id',$uid)->with('profile')->first();
       // dd($profile);
        return view('trainer.dashboard.setting', compact('profile'));
    }
        public function fileUpload(Request $request)

    {

        $this->validate($request, [

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $image = $request->file('image');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/img/profilePic');
       
        $image->move($destinationPath, $input['imagename']);

        $path=$destinationPath.$input['imagename'];
            //$profile=User::where('id',Auth::user()->id)->first();
            $profile=User::find(Auth::user()->id);
            $profile->prpic=$input['imagename'];
            $profile->save();

        return back()->with('success','Image Upload successful');

    }
    public function addProfile(Request $request){
        $this->validate($request, [

            'profilename' => 'required',
            'skill' => 'required',
            'education' => 'required',
            'address' => 'required',
        ]);
        $ip= \Request::ip();
         $data1 = \Location::get($ip);
         
       $req=$request->all();
       $req['ip']=$ip;
       $req['city']=$data1->cityName;
       $req['state']=$data1->regionName;
       $req['country']=$data1->countryName;
       $req['lat']=$data1->latitude;
       $req['long']=$data1->longitude;
       unset($req['_token']);
       $affectedRows = Profile::where('user_id', Auth::user()->id)->update($req);
      return back();
    }
    
    
}
