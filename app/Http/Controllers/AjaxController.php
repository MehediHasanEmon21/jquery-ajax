<?php

namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AjaxController extends Controller
{
    public function index(){

        $products = DB::table('products')->orderBy('id','ASC')->paginate(5);

        return view('index',compact('products'));

    }

    public function fetch_data(Request $request){

	      $sort_by = $request->get('sort_by');
	      $sort_type = $request->get('sort_type');
	      $query = $request->get('query');
	      $products = DB::table('products')
	      				->where('product_name', 'like', '%'.$query.'%')
	                    ->orderBy($sort_by, $sort_type)
	                    ->paginate(5);
	      return view('paginate_data', compact('products'))->render();

    }



    

}
