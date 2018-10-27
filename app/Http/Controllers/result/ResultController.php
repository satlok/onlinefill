<?php

namespace App\Http\Controllers\result;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Result;
class ResultController extends Controller
{
    public function index()
    {
        $result=  Result::orderBy('id', 'desc')->paginate(10);
        return view('result.index', compact('result'));
    }
}
