<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
class AjaxController extends Controller
{
    public function index(){

    	return view('index');

    }

    public function getData(Request $request){

    	$query = $request->get('query');

    	$countries = DB::table('apps_countries')->where('country_name','LIKE','%'.$query.'%')->get();

    	$output = '<ul class="dropdown-menu" style="display:block; position:relative">';

    	foreach ($countries as $country) {
    		$output .= '
       <li><a href="#">'.$country->country_name.'</a></li>
       ';
    	}

    	$output .='</ul>';

    	echo $output;

    }
}
