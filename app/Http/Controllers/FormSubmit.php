<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend;
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
            'image' => ['required','image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);

        $data = new Friend;

        $data->username = $request->input('username');
        $data->temp_email = $request->input('temp_email');
        $data->mobile = $request->input('mobile');
        $data->password = $request->input('password');
        // $data->image = $request->file('image')->store('public');

        if ($request->hasFile('image')) {
            $imageName =  'img-' . time() . '.' . $request->image->extension(); 
            $imagePath = 'assets/image/' . $imageName;
            $request->image->move(public_path('assets\image'), $imageName);
            $data->image =$imagePath;
        }

        

        $data->save();

        return back()
                    ->with('success', $data->username.', you have successfully upload form.')
                    ->with('image', $imageName);



    }


    public function records(){

        $records = Friend::all();




        return view('records', compact('records'));
    }
}
