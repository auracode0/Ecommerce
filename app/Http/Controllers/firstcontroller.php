<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\session;
use Symfony\Component\HttpFoundation\Session\Session as HttpFoundationSession;

class firstcontroller extends Controller
{
    public function Mainpage () {
      if(Auth::user()){
        session::put('username',auth()->user()->name);

      }
     

      session::put('date','12-12-2012');
      $categories=Category::all();
      return view('welcome',['categories'=>$categories]);
    }


    public function reviews () {
    $reviews=Review::all();
    return view('/reviews',['reviews'=>$reviews]);
    }

    public function storereview (Request $request) {
      
      $request->validate([
        'name'=>'required|max:100|unique:reviews',
        'phone'=>'required',
        'email'=>'required',
        'subject'=>'required',
        'message'=>'required'


    ]);


     $newReview= new Review();
    $newReview->name=$request ->name;
    $newReview->phone=$request ->phone;
    $newReview->email=$request ->email;
    $newReview->subject=$request ->subject;
    $newReview->message=$request ->message;
    $newReview->save();
    
    return redirect('/reviews');
    }

    public function GetCategoryProduct($catid=null) {

        if($catid){
          $products=Product::where('category_id' ,$catid)->paginate(6);
          return view('product',['products'=>$products]);
    
        }
    else{
        $products=Product::paginate(6);
        return view('product',['products'=>$products]);
      } 
    }


    public function GetAllCategoryWithProduct  () {

    $categories=Category::all();
    $products=Product::all();
    return view('category',['products'=>$products,'categories'=>$categories]);
     }


     public function search(Request $request) {
      $products=Product::where('name','like','%'.$request->searchKey.'%')->paginate(6);
      return view('product',['products'=>$products]);
    }
}
