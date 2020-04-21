<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
class AjaxController extends Controller
{
    public function index(){

        $data = DB::table('tbl_employee')
               ->select(
                'gender',
                DB::raw('count(*) as number'))
               ->groupBy('gender')
               ->get();
         $array[] = ['Gender', 'Number'];
         foreach($data as $key => $value)
         {
          $array[++$key] = [$value->gender, $value->number];
         }

    	return view('index')->with('gender', json_encode($array));

    }

}
