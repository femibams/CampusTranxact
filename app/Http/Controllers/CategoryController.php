<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
 
class CategoryController extends Controller
{
  
        public function show($id){
          $products=product::where('category_id','=',$id)
           ->get();
       
           return view('categories.show',compact('products'));
        }

       
 
    
}
