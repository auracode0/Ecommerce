<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\user;
use App\Models\Order;
use App\Models\Orderdetails;
use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
    public function cart(){

       $user_id=auth()->user()->id;
       $cartProducts=cart::with('Product')->where('user_id',$user_id)->get();

        return view('Product.cart',['cartProducts'=>$cartProducts]);
    }


    public function addproducttocart($productid){
        
        $user_id=auth()->user()->id;
        $result=cart::where('user_id',$user_id)->where('product_id',$productid)->first();

        if($result){
            $result->quantity+=1;
            $result->save();
        }
        else{
        $newCart=new cart();
        $newCart->product_id=$productid;
        $newCart->user_id=auth()->user()->id;
        $newCart->quantity=1;
        $newCart->save();
        }
        return redirect('/cart');
    }


    function deletecartitem($cartid){
        cart::find($cartid)->delete();
        return redirect('/cart');
    }

    function completeorder(){

        $user_id=auth()->user()->id;
        $cartProducts=cart::with('Product')->where('user_id',$user_id)->get();


        return view('Product.completeorder',['cartProducts'=>$cartProducts]);
    }

    function storeorder(Request $request){
         
        $user_id=auth()->user()->id;

        $neworder= new Order();
        $neworder->name=$request->name;
        $neworder->email=$request->email;
        $neworder->address=$request->address;
        $neworder->phone=$request->phone;
        $neworder->note=$request->note;
        $neworder->user_id=$user_id;


        $neworder->save();

        $cartProducts=cart::with('Product')->where('user_id',$user_id)->get();

        foreach($cartProducts as $item){
            $neworderDetail= new Orderdetails();
            $neworderDetail->product_id=$item->product_id;
            $neworderDetail->price=$item->Product->price;
            $neworderDetail->quantity=$item->quantity;
            $neworderDetail->order_id=$neworder->id;


            $neworderDetail->save();

        }

        cart::where('user_id',$user_id)->delete();

        return redirect('/');
    }
    function previousorder(){
        $user_id=auth()->user()->id;
        $result=Order::with('orderdetails')->where('user_id',$user_id)->get();
        

        return view('Product.previousorder',['orders'=>$result]);
    }
}
