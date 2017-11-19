<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\passwordvalidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function details(Request $request){
        $user = User::find(Auth::id());

        $user->name = $request['name'];
        $user->university_id = $request['university_id'];
        $user->mobilenumber = $request['number'];
        $user->email = $request['email'];
        $user->save();

        return back();
    }

    public function update(Request $request){  
       /* $this->validate($request,[
            'oldpassword'=>'required',
            'newpassword'=>'required|confirmed',
        ]);*/
        $user=User::find(Auth::id());
        $user_oldpassword=$user->password;
       if(Hash::check($request->oldpassword,$user_oldpassword)) {
           $user->fill([
               'password'=>Hash::make($request->newpassword)
           ])->save();
           $request->session()->flash('message','Your password has been changed');
           return back();
       }else
       $request->session()->flash('message','Your password has been changed');
         return back();
}
}
