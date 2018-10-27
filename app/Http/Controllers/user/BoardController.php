<?php

namespace App\Http\Controllers\user;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\model\Board;
use App\model\Directory;
use App\model\Material;
use Mail;
use PDF;

class BoardController extends Controller
{
    //
     public function __construct()
    {
       $this->middleware(array('auth:web'));
    }
    
    public function index(){
        $boards=Board::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->paginate(12);
        //dd($board);
        return view('user.board.index', compact('boards'));
    }
    
    public function create(Request $req){
        $r=$req->all();
         $this->validate($req, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
         if($req->file('file')){
        $image = $req->file('file');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img/board');
        $image->move($destinationPath, $input['imagename']);
        $path=$destinationPath.$input['imagename'];
        $board['pic']=$input['imagename'];
         }
            $board['user_id']=Auth::user()->id;
            $board['title']=$r['title'];
            $board['description']=$r['description'];
            $b=Board::create($board);
            if($b){
              return back()->with('success','Board Created successful');  
            }
            else{
                return back()->with('error','Board not created');
            }
           
    }
    
    public function edit(){
        return view('user.board.index');
    }
    
    public function delete(){
        return view('trainer.board.index');
    }
    public function view($board_id){
        $board=Board::where('user_id',Auth::user()->id)
                ->where('id',$board_id)
                ->with(['directory' => function($q) {
                        $q->whereNull('parent_id');
                    }])
                ->first();
       // dd($board);
       if($board){
        return view('user.board.view',compact('board'));
       }
       else{
           return view('user.dashboard.user404');
       }
    }
    
    public function create_dir(Request $req){
        $r=$req->all();
        $dir=Directory::create($r);
        return back();
    }
    public function view_dir($id){
        $id=base64_decode($id);
       $dir= Directory::where('id',$id)->with('material')
                ->first();
       
       //dd($dir->material);
        if($dir){
            $subDir=Directory::where('parent_id',$dir->id)->get();
        return view('user.board.view_dir',compact('dir','subDir'));
       }
       else{
           return view('user.dashboard.user404');
       }
    }   
    public function create_amatter(Request $req){
        $r=$req->all();
        //dd($r);
        if($req->file('file')){
        $image = $req->file('file');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img/dir');
        $image->move($destinationPath, $input['imagename']);
        $path=$destinationPath.$input['imagename'];
        $r['img']=$input['imagename'];
        }
        else{
        $r['matter'] = htmlentities($r['matter'], ENT_QUOTES);
        }
        Material::create($r);
        return back();
    }
    
     public function view_file($id){
        $id=base64_decode($id);
       $file= Material::where('id',$id)->first();
      // dd($file);
        return view('user.board.view_file',compact('file'));
    } 
    
    public function create_mail(Request $req){
          $req=$req->all();
          $data = Material::findOrFail($req['material_id']);
          $a=str_replace(array( '[', ']','"'), '', $req['email']);
          $a=explode(",",$a);
            Mail::send('emails.pic', ['data' => $data], function ($m) use ($data,$a) {
            $m->from('info@onlinefill.in', 'online fill');
            if($data->img != null){
                $pathToFile=asset('public/img/dir/').'/'.$data->img;
                $m->attach($pathToFile);
            }
            else{
                PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        	// pass view file
               $pdf = PDF::loadView('pdf.pdffile', compact('data'));
               $m->attachData($pdf->output(),"matterial.pdf");
                //$m->attachData($data->matter, "matterial.pdf");
            }
            //$m->subject('Confidential Data');
            $m->to($a)->subject('Your Friend share a file');
        });
         return back();
         
    } 
    
    public function inviteInBoard(Request $req){
          $req=$req->all();
          $data = Board::findOrFail($req['board_id']);
          $a=str_replace(array( '[', ']','"'), '', $req['email']);
          $a=explode(",",$a);
            Mail::send('emails.file', ['board' => $data,'user'=>Auth::user()], function ($m) use ($data,$a) {
            $m->from('info@onlinefill.in', 'online fill');
            $m->to($a)->subject('Your Friend share a file');
        });
         
         return back();
    }
     public function userFilePdf(Request $req){
          $req=$req->all();
          $datas = Material::where('directory_id',$req['d_id'])->get();
         PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        	// pass view file
               $pdf = PDF::loadView('pdf.pdffileall', compact('datas'));
               return $pdf->download('pdfview.pdf');
         return back();
    }
}
