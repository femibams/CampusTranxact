<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\picture;
use App\status;
use App\category;
use App\User;
use Mail;
use App\Mail\Contact;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
 public function create(){
     $categories=category::all();
     
    /*  $data = [
        'category' => $category
     ]; */
     return view('products.create', compact('categories'));
   }
   

   public function store(Request $request){

    $this->validate($request,[
        'productname'=>'required|min:10',
        'price' =>'required|integer',
         'description'=>'required|min:10',
        ]);
    $date=Carbon::now()->addDays(3);
    $product = new product;

    //$product=product::create($request->all(),$date);
    $product = product::create([
        'user_id'=>$request['user_id'],
        'product_name' =>$request['productname'],
        'price' =>$request['price'],
        'category_id' =>$request['category'],
        'status_id' =>$request['status'],
        'expiry_date'=>$date,
        'product_description' =>$request['description']
        ]); 
    foreach($request['picture'] as $photo){
            $filename = $photo->store('public');
            $filename = $photo->hashName();
            picture::create([
                'product_id'=> $product->id,
                'url'=>$filename
            ]);

   }
 return redirect('/home')->with('message','Advert successfully posted');

 
}
public function show(product $id){
    //$product=product::findOrFail($id);
    $related_products = product::where('category_id',$id->category_id)
                                 ->get()->take(4);
    // dd($related_products);
    $categories=category::all();
    $id->views = $id->views + 1;
    $id->save();
  
    
  
     $data = [
        'product' => $id,
        'related_products' => $related_products,
        'categories'=>$categories
        
     ];

   
    return view('products.show', $data);
}

public function edit($id){
    $product = product::find($id);
    $categories = category::all();

    return view('products.update', compact('product','categories'));

}

public function update(Request $request){

    $this->validate($request,[
        'product_name'=>'required|max:200',
        'price'=>'required|integer',
         'production_description'=>'requried'
        ]);

    $product = product::find($request->product_id);
    $date=Carbon::now()->addDays(3);
    $product->product_name = $request['productname'];
    $product->price = $request['price'];
    $product->category_id = $request['category'];
    $product->status_id = $request['status'];
    $product->expiry_date = $date;
    $product->product_description = $request['description'];
    $product->save();

    if ($request->has('picture')){
        $pics = picture::where('product_id', $product->id)->get();
        $pics->delete();

        foreach($request['picture'] as $photo){
            $filename = $photo->store('public');
            $filename = $photo->hashName();
            picture::create([
                'product_id'=> $product->id,
                'url'=>$filename
            ]);
        }
    }

    return redirect('/User_Ads')->with('message', 'Advert Updated');
    
}

public function delete($id){
    $product = product::find($id);
    $product->delete();

    return back();
}
public function search(Request $request){
    
       if($request->category =="all"){
           $products = product::where('product_name', $request['product_name'])
                              ->orWhere('product_name','like','%'.$request['product_name'].'%')->simplepaginate(8);
                              
                              return view('search.index',compact('products'));
       }else{
           $products = product::where('category_id', $request['category'])
                              ->Where('product_name','like','%'.$request['product_name'].'%')->paginate(8);
           
           return view('search.index',compact('products'));
       }
   }
   public function send()
   {
     $user = Auth::user();
      $mail= Mail::to($user)->send(new Contact($user));
      dd($mail);
     return view('products.show',compact('mail','user'));
    }
}  
