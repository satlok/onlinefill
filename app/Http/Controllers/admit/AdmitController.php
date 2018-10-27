<?php

namespace App\Http\Controllers\admit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\AdmitCard;
class AdmitController extends Controller
{
    public function index()
    {
        $res=  AdmitCard::orderBy('id', 'desc')->paginate(10);
        return view('admit.index', compact('res'));
    }
}
