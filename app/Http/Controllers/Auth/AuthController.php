<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    function index(){

        return view('admin.dashboard');
    }

    function login(){
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
        else {
            return back()->with('error' , 'Email and Password are not matched.');
        }
    }

    function updatePassword(Request $request){
        /* $request->validate([
             'email' => 'required|email|exists:users',
             'new_password' => 'required|min:8|confirmed',
             'password_confirm' => 'required',

         ]);*/
        /* $user = DB::table('password_resets')->whereEmail($request->email)->first();
         if($user==null){
             return back()->with('error','Email are not Exists');
         }*/


        $updatePassword = DB::table('password_resets')
            ->where([ 'token' => $request->token])
            ->first();

        $get_mail = $updatePassword->email;

        $user=User::where('email',$get_mail)->first();

        $update  = new User();
        $update->exists=true;
        $update->id=$user->id;
        $update->password=Hash::make($request->new_password);
        $update->save();

        if ($update=true) {

            $done = DB::table('password_resets')->where(['email'=>$get_mail])->update([
                'active'=>0
            ]);
            if ($done==false){
                return redirect()->back()->with('error','Some Thing wrong !!! ');
            }

            return redirect('/login')->with('message', 'Your password has been changed!');
        }

    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }










}
