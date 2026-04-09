<?php

use App\Http\Controllers\firstcontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;

Route::get('/',[firstcontroller::class,'Mainpage'] )->middleware('customauth');
Route::get('/product/{catid?}',[firstcontroller::class,'GetCategoryProduct'])->name('prods');
Route::get('/category',[firstcontroller::class,'GetAllCategoryWithProduct'] )->name('cats');
Route::get('/reviews',[firstcontroller::class,'reviews'] );
Route::post('/storereview',[firstcontroller::class,'storereview'] );




Route::get('/addproduct',[ProductController::class,'AddProduct']);
Route::post('/storeproduct',[ProductController::class,'storeProduct']);
Route::get('/removeproduct/{productid?}',[ProductController::class,'RemoveProduct']);
Route::get('/editproduct/{productid?}',[ProductController::class,'EditProduct'])->middleware('auth');

Route::post('/search',[firstcontroller::class,'search'] );


Auth::routes();
Route::get('/ProductsTable',[ProductController::class,'ProductsTable']);
Route::get('/AddProductImages/{productid}',[ProductController::class,'AddProductImages']);
Route::get('/removeproductphoto/{imageid}',[ProductController::class,'removeproductphoto']);
Route::post('/storeproductimage',[ProductController::class,'storeproductimage']);
Route::get('/single-product/{productid}',[ProductController::class,'showProduct']);



Route::get('/cart',[CartController::class,'cart'])->middleware('auth');
Route::get('/addproducttocart/{productid}',[CartController::class,'addproducttocart'])->middleware('auth');
Route::get('/deletecartitem/{cartid}',[CartController::class,'deletecartitem']);

Route::get('/completeorder',[CartController::class,'completeorder'])->middleware('auth');
Route::get('/previousorder',[CartController::class,'previousorder'])->middleware('auth');
Route::post('/storeorder',[CartController::class,'storeorder']);


Route::post('/lang',function(Request $request){
    
    session()->put('locale',$request->locale);

    
    return redirect()->back();
}
)->name('changeLanguage');

Route::get('/admin',function(){
    return "admin panel";
})->middleware('checkrole:admin, ');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
