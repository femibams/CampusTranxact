<?php

namespace App\Http\Controllers;

use App\User;
use App\product;
use App\category;
use App\university;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::paginate(12);
        $categories=category::all();
        $users=User::all();
       //dd($users);
        //dd($products[1]->pictures[0]->url);
        return view('home.index',compact('products','categories','users'));
    }
    
    public function create(){
        $universities=university::all();
        return view('registration.studentreg',compact('universities'));
        
           
    }
    
    public function store(Request $request){
        
         $this->validate($request,[
           'name' => 'required|string|max:255',
            'university_id' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobilenumber' => 'required|max:11',
            'password' => 'required|string|min:6|confirmed'

            ]);
        
         //$dataInput=$request->all();
    	 //$user=Auth::user();
    	
    	//User::create($dataInput);
        
        User::create([
            'name' => $request['name'],
            'university_id' =>$request['university_id'],
            'user_type' =>$request['user_type'],
            'email' => $request['email'],
            'mobilenumber' => $request['mobilenumber'],
            'password' => bcrypt($request['password'])
            
        ]);
        return redirect('/home')->with('message','successfully done');

        
    }
    
      public function homecreate(){
        
        return view('registration.businessreg');
        
        
    }
    
    
     public function homestore(Request $request){
        
         $this->validate($request,[
           'businessname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobilenumber' => 'required|max:11',
            'password' => 'required|string|min:6|confirmed'

            ]);
        
         //$dataInput=$request->all();
    	 //$user=Auth::user();
    	
    	//User::create($dataInput);
        
        User::create([
            'name' => $request['businessname'],
            'user_type' =>$request['user_type'],
            'email' => $request['email'],
            'mobilenumber' => $request['mobilenumber'],
            'password' => bcrypt($request['password'])
            
        ]);
        return redirect('/home')->with('message','successfully done');

        
    }
    
    
    public function search(Request $request){
     
        if($request->category =="all"){
            $products = product::where('product_name', $request['product_name'])
                               ->orWhere('product_name','like','%'.$request['product_name'].'%')->paginate(8);
                               
                               return view('search.index',compact('products'));
        }else{
            $products = product::where('category_id', $request['category'])
                               ->Where('product_name','like','%'.$request['product_name'].'%')->paginate(8);
            
            return view('search.index',compact('products'));
        }
    }
}
