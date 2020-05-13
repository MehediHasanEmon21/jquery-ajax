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


    public function insert(Request $request)
    {
         if($request->ajax())
         {
          $rules = array(
           'first_name.*'  => 'required',
           'last_name.*'  => 'required'
          );
          $error = Validator::make($request->all(), $rules);
          if($error->fails())
          {
           return response()->json([
            'error'  => $error->errors()->all()
           ]);
          }

          $first_name = $request->first_name;
          $last_name = $request->last_name;

          for ($i=0; $i <count($first_name) ; $i++) { 
             
             $data = [
                'first_name' => $first_name[$i],
                'last_name' => $last_name[$i],
             ];

             $insert[] = $data;

          }

          DynamicField::insert($insert);
          return response()->json([
           'success'  => 'Data Added successfully.'
          ]);

         }
    }

    





    

}
