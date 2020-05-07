<?php

namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AjaxController extends Controller
{
    public function index(){

        $products = DB::table('products')->orderBy('id','ASC')->get();

        return view('index',compact('products'));

    }

    public function fetch_data(Request $request){

	      if ($request->ajax()) {

	      	$data = DB::table('products')->whereBetween('date',[$request->from, $request->to])->get();
	      	return response()->json([
	      		'product' => $data,
	      		'count' => $data->count()
	      	]);
	      	
	      }

    }



    

}
