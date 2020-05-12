<?php

namespace App\Http\Controllers;


use App\AjaxCrud;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AjaxController extends Controller
{
    public function index(){
    	
    
        return view('index');

    }

    public function getData(){

    		$users = AjaxCrud::latest()->get();
    		return datatables()->of($users)
    		->addColumn('action',function($user){
    			 $button = '<button type="button" name="edit" id="'.$user->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                 $button .= '&nbsp;&nbsp;';
                 $button .= '<button type="button" name="delete" id="'.$user->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                 return $button;
    		})
    		->make(true);


    }

    public function storeData(Request $request){

    	$rules = array(
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'image'         =>  'required|image'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('test'), $new_name);

        $form_data = array(
            'first_name'        =>  $request->first_name,
            'last_name'         =>  $request->last_name,
            'image'             =>  $new_name
        );

        AjaxCrud::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = AjaxCrud::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $rules = array(
                'first_name'    =>  'required',
                'last_name'     =>  'required',
                'image'         =>  'image'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('test'), $image_name);
        }
        else
        {
            $rules = array(
                'first_name'    =>  'required',
                'last_name'     =>  'required'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_data = array(
            'first_name'       =>   $request->first_name,
            'last_name'        =>   $request->last_name,
            'image'            =>   $image_name
        );
        AjaxCrud::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

     public function destroy($id)
    {
        $data = AjaxCrud::findOrFail($id);
        $data->delete();
    }





    

}
