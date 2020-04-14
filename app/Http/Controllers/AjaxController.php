<?php

namespace App\Http\Controllers;

use App\Contactus;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index(){

    	return view('contact');

    }

    public function submit(Request $request){

    	Contactus::create($request->all());
    	return redirect()->back()->with('success','Successfully Saved');

    }
}
