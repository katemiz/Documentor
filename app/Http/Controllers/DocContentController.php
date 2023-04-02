<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocContentController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            return $next($request);
        });
    }
    




    public function form(Request $request)
    {
        return view('doc.contentform',[
            "doc" => false,
        ]);
    }






}
