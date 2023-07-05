<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function registertaionPage(){
       return view('blogging.auth.register');
    }

    public function registerUser(Request $request){
        $request->flash();
         Validator::make($request->all(),[
            'name'=>'required|string|min:3',
            'email'=>'required|email',
            'password'=>'required|min:6',
            're_password'=>'required|same:password'
         ])->validate();
         try {
            $user_exist=User::where('email',$request->email)->first();
            if($user_exist){
                throw new Exception('Your are already register with us.Please login to continue');
            }
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->save();
            return redirect()->route('user.login')->with('success','User successfully registered.Please login to continue');
         } catch (Exception $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
         }
    }

    public function loginPage(){
      return view('blogging.auth.login');
    }

    public function loginUser(Request $request){
       Validator::make($request->all(),[
        'email'=>'required|email',
        'password'=>'required|min:6'
       ])->validate();
       try {
        $user_exist=User::where('email',$request->email)->first();
        if(!$user_exist){
            throw new Exception('This Email is not register with us.Plesae register');
        }
        if(!Hash::check($request->password,$user_exist->password)){
            throw new Exception('Password doesnot match!Re enter your password');
        }
        Auth::login($user_exist);
        return redirect()->route('post.list');
       } catch (Exception $ex) {
         return redirect()->back()->with('warning',$ex->getMessage());
       }
    }

    public function logoutUser(Request $request){
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerate();
       return redirect()->route('user.login');
    }
}
