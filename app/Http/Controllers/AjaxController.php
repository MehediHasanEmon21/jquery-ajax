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

    public function getData(Request $request){

        if(!empty($request->from_date))
          {
           $data = DB::table('tbl_products')
             ->whereBetween('date', array($request->from_date, $request->to_date))
             ->get();
          }
          else
          {
           $data = DB::table('tbl_products')
             ->get();
          }

          return datatables()->of($data)->make(true);

    }


   

    





    

}
