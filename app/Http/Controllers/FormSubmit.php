<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\Datatables;
use DB;

class FormSubmit extends Controller

{


    
    public function form(){
        return view('form');
    }



    public function store_data(Request $request){

        $validate = $request->validate([
            'username' => ['required', 'unique:friends'],
            'temp_email' => ['required', 'unique:friends', 'email'],
            'mobile' => ['required', 'unique:friends', 'numeric'],
            'password' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);
 
        $data = new Friend; 

        $data->username = $request->input('username');
        $data->temp_email = $request->input('temp_email');
        $data->mobile = $request->input('mobile');
        $data->password = $request->input('password');
    

        if ($request->hasFile('image')) { 
            $imageName =  'img-' . time() . '.' . $request->image->extension(); 
            $imagePath = 'assets/image/' . $imageName;
            $request->image->move(public_path('assets\image'), $imageName);
            $data->image =$imagePath;
        }

        

        $data->save();
        if (isset($imageName)) {
            return back()->with('success', $data->username . ', you have successfully uploaded the form.')->with('image', $imageName);
        } else {
            return back()->with('success', $data->username . ', you have successfully uploaded the form.');
        }

        // return back()
        //             ->with('success', $data->username.', you have successfully upload form.')
        //             ->with('image', $imageName);



    }


    public function records(){

        $records = Friend::all();




        return view('records', compact('records'));
    }

    public function delete_records($id){
        Friend::destroy($id); 

        return back();
    }





    

    public function edit_record($id){
        $data = Friend::find($id); 

        return view('edit_form', compact('data'));

    }





    public function update_data(Request $request , $id){
 
        $data = Friend::find($id);

        $data->username = $request->input('username');
        $data->temp_email = $request->input('temp_email');
        $data->mobile = $request->input('mobile');
        $data->password = $request->input('password');
    

        if ($request->hasFile('image')) { 

            $OldImagePath = $data->image;

            $imageName =  'img-' . time() . '.' . $request->image->extension(); 
            $imagePath = 'assets/image/' . $imageName;
            $request->image->move(public_path('assets\image'), $imageName);
            $data->image =$imagePath;


            if ($OldImagePath && File::exists(public_path($OldImagePath))){
                File::delete(public_path($OldImagePath));
            }
        }

       

        

        
         
        $data->save(); 

        return redirect('records')
                            ->with('success', $data->username.', you have successfully updated your profile.');
                    
    }


    public function viewdt(Request $request)
    {
        if ($request->ajax()) {
            $data = Friend::query();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editUrl = route('edit_record', $row->id);
                    $deleteUrl = route('delete_records', $row->id);
                    $actionBtn = '<a href="'.$editUrl.'" class="edit btn btn-success btn-sm">Edit</a> <a href="'.$deleteUrl.'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('viewdt');
    }
}


