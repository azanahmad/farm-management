<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{

    function __construct()
    {
        date_default_timezone_set("Asia/Karachi");

    }

    public function user(){
        return view('admin.user.add');
    }

    function user_register(Request $request){
        $user = User::whereEmail($request->email)->first();
        if($user==true){
            return back()->with('error','Email is already Exists');
        }

        $validator=Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|confirmed|min:8',
            ]
        );

        if($validator->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $save = new User();
        $save->name = $request->name;
        $save->email = $request->email;
        $save->password = Hash::make($request->password);
        $save->save();

        if($save==true)
            return redirect()->back()->with('success','User Registered Successfully');
        else
            return redirect()->back()->with('error','Something went wrong please try again later.')->withInput();

    }

    public function user_list(){

        $users = User::get();

        return view('admin.user.index',['users'=>$users]);
    }
    public function user_edit(Request $request){

        $id = $request->id;
        $edit = User::find($id);


        return view('admin.user.add',['edit'=>$edit]);
    }

    public  function  user_update(Request $request){
        $validator=Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required',

            ]
        );

        if($validator->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $id =  $request->id;

        $update  = new User();
        $update->exists=true;
        $update->id=$id;
        $update->name = $request->name;
        $update->email = $request->email;

        $update->save();
        if ($update==true){
            return redirect()->route('users.list')->with('success','User Updated Successfully.');
        }


    }

    public function user_delete(Request $request){

        if(Auth::id() == $request->id)
        {
            return redirect()->back()->with('error',"You can't delete your self..");
        }

        if($request->id == 1)
        {
            return redirect()->back()->with('error',"Super admin can't be deleted");
        }

        User::where('id',$request->id)->delete();

        return redirect()->back()->with('success','User deleted successfully');

    }

    function userdashboard(){

        return view('admin.user.dashboard');
    }

    function profile(Request $request){
        $id = $request->id;
        $edit = User::find($id);
        return view('admin.user.editprofile',['edit'=>$edit]);
    }
    function  profile_update(Request $request){
        $validator=Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required',

            ]
        );

        if($validator->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $id = $request->id;
        $update = new User();
        $update->exists = true;
        $update->id = $id;
        $update->name = $request->name;
        $update->email = $request->email;
        $update->save();
        if ($update == true){
            return redirect()->back()->with('success',"Profile Updated Successfully");
        }
    }

    function password_update(Request  $request){

        $validator=Validator::make($request->all(),
            [
                'password' => 'required|confirmed|min:8',

            ]
        );

        if($validator->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $id = $request->id;
        $update = new User();
        $update->exists = true;
        $update->id = $id;
        $update->password = Hash::make($request->password);
        $update->save();

        if ($update==true){


            return redirect()->back()->with('success',"Password Updated Successfully");

        }
        else{
            return redirect()->back()->with('error',"Something went wrong please try again later.");

        }


    }

}
