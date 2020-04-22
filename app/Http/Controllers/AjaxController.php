<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
class AjaxController extends Controller
{
    public function index(){

      $data = DB::table('tbl_employee')
                ->paginate(5);

    	return view('index',compact('data'));

    }

    public function fetch(){

        $data = DB::table('tbl_employee')
                ->paginate(5);
        return view('paginate_data',compact('data'))->render();

    }

}
