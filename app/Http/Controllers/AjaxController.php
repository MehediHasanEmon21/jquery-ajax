<?php

namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AjaxController extends Controller
{
    public function index(){

        $products = DB::table('products')->orderBy('id','ASC')->limit(10)->get();

        return view('index',compact('products'));

    }

    public function fetch_data(Request $request){

	      if ($request->ajax()) {

	      	$data = DB::table('products')->where('id', '>', $request->id)->limit(10)->get();
	      	foreach ($data as $key => $d) {
	      		$d->short_details = substr($d->product_details, 0, 300);
	      		$last_id = $d->id;
	      	}

	      	if (count($data) > 0 ) {
	      		return response()->json([
	      		'product' => $data,
	      		'last_id' => $last_id
	      		]);
	      	}else{
	      		return response()->json([
	      		'last_id' => 0
	      		]);
	      	}
	      	
	      	
	      	
	      }

    }



    

}
