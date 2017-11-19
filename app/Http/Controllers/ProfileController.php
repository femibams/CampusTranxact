<?php

namespace App\Http\Controllers;

use App\product;
use App\university;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index(){
       $products= product::where('user_id', Auth::id())->get();
       //dd($products);
       $universities = university::all();
        return view('profiles.index',compact('products','universities'));
    } 

    public function show(){
        $products= product::where('user_id', Auth::id())->get();
        return view('profiles.show',compact('products'));
    
    }
    public function update(Request $request){
            $this->validate($request,[
                'oldpassword' => 'required',
                'newpassword' => 'required|confirmed|min:6',
                ]);
            $user=User::find(Auth::id());
            $user_oldpassword=$user->password;
           if(Hash::check($request->oldpassword,$user_oldpassword)) {
               $user->fill([
                   'password'=>Hash::make($request->newpassword)
               ])->save();
               $request->session()->flash('message','Your password has been changed');
               return back();
           }
           $request->session()->flash('message','Your password has been changed');
             return back();

    }
}
