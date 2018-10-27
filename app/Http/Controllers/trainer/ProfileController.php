<?php

namespace App\Http\Controllers\trainer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function __construct()
    {
       $this->middleware(array('auth:web'));
    }
    public function index(){
        $uid=Auth::user()->id;
        $profile=User::where('id',$uid)->with('profile')->first();
        //dd($profile->profile->pic);
        
        return view('trainer.profile.index', compact('profile'));
    }
}
