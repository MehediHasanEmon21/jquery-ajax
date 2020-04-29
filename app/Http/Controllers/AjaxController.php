<?php

namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AjaxController extends Controller
{
    public function index(){

        return view('index');

    }

    public function upload_file(Request $request){

        $validation = Validator::make($request->all(),[
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validation->passes()) {
            
            $image = $request->file('select_file');
            $image_name = time().'-'.$image->getClientOriginalExtension();
            $image->move(public_path('images'),$image_name);

            return response()->json([
                'message' => 'successfully uploaded',
                'upload_image' => '<img src="/images/'.$image_name.'" style="width: 200px; height: 200px">',
                'class_name' => 'alert-success'
            ]);

        }else{

            return response()->json([
               'message'   => $validation->errors()->all(),
               'uploaded_image' => '',
               'class_name'  => 'alert-danger'
            ]);

        }


    }

    

}
