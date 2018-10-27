<?php

namespace App\Http\Controllers\trainer;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\model\Board;
use App\model\Directory;
use App\model\Material;

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
        return view('trainer.board.index', compact('boards'));
    }
    
    public function create(Request $req){
        $r=$req->all();
         $this->validate($req, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $req->file('file');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img/board');
        $image->move($destinationPath, $input['imagename']);
        $path=$destinationPath.$input['imagename'];
            $board['user_id']=Auth::user()->id;
            $board['title']=$r['title'];
            $board['description']=$r['description'];
            $board['pic']=$input['imagename'];
            $b=Board::create($board);
            if($b){
              return back()->with('success','Board Created successful');  
            }
            else{
                return back()->with('error','Board not created');
            }
           
    }
    
    public function edit(){
        return view('trainer.board.index');
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
        return view('trainer.board.view',compact('board'));
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
       $subDir=Directory::where('parent_id',$dir->id)->get();
       //dd($dir->material);
        return view('trainer.board.view_dir',compact('dir','subDir'));
    }   
    public function create_amatter(Request $req){
        $r=$req->all();
       // dd($r);
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
}
