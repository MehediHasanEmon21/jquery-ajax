<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
class AjaxController extends Controller
{
    public function index(){

    	$products = DB::table('products')->orderBy('id','DESC')->get();
    	return view('live_search',compact('products'));

    }

    public function getData(Request $request){

    	$query = $request->input('query');

    	$products = DB::table('products')->where('product_name','LIKE','%'.$query.'%')->get();

    	return response()->json([
    		'products' => $products,
    		'product_count' => count($products)
    	]);

    }
}
