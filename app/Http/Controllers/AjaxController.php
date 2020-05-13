<?php

namespace App\Http\Controllers;


use App\AjaxCrud;
use App\DynamicField;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AjaxController extends Controller
{
    public function index(){
    	
    
        return view('index');

    }


    public function check(Request $request)
    {
         $email = trim($request->email);

         $emailCheck = DB::table('register_user')->where('user_email',$email)->get();

         if (count($emailCheck) == 0) {
             $output = ['success' => true];
             return response()->json($output);
         }

    }

    





    

}
