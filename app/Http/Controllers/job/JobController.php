<?php

namespace App\Http\Controllers\job;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Job;
use App\model\Detail;
class JobController extends Controller
{
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
        $job = Job::orderBy('id', 'desc')->paginate(10);
        //dd($job);
        return view('job.index', compact('job'));
    }
     public function detail($id)
    {
        $job = Job::where('id',$id)->first();
        $detail = Detail::where('job_id',$id)->first();
        $description=$myCaptionDecoded = html_entity_decode($detail->description);
        //echo $description;
        //dd($detail);
        return view('job.detail', compact('job','description'));
    }
}
