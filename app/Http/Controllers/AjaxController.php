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

    public function upload(Request $request){

        if($request->ajax())
       {
        $image_data = $request->image;
        $image_array_1 = explode(";", $image_data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $image_name = time() . '.png';
        $upload_path = public_path('crop_image/' . $image_name);
        file_put_contents($upload_path, $data);
        return response()->json(['path' => '/crop_image/' . $image_name]);
       }
       

    }


   

    





    

}
