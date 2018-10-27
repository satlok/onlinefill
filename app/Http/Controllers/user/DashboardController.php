<?php

namespace App\Http\Controllers\user;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\model\Profile;
use Redirect;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(array('auth:web'));
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index($pid=NULL)
    {
     
        return view('user.dashboard.index', compact('res'));
    }
    public function user404(){
        return view('user.dashboard.user404');
    }
    public function createFolder(Request $req)
    {
        $id= Auth::user()->id;
        //dd(Auth::user()->id);
       $data=$req->all();
       $data1['name']=$data['name'];
       $data1['parrent']=$data['parrent'];
       $data1['child']=$data['child'];
       $data1['user_id']=$id;
       $res= Folder::create($data1);
       return Redirect::route('home');
    }
    
    
    public function setting(){
        $uid=Auth::user()->id;
        $profile=User::where('id',$uid)->with('profile')->first();
       // dd($profile);
        return view('user.dashboard.setting', compact('profile'));
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
