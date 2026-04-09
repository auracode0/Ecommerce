<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Milon\Barcode\DNS1D;

class ProductController extends Controller
{
    public function AddProduct()
    {

        $allcategories = Category::all();
        return view('Product.addproduct', ['allcategories' => $allcategories]);
    }


    public function storeProduct(Request $request)
    {
        ################update#############
        if ($request->id) {
            $request->validate([
                'name' => 'required|max:100',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'imagepath' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'required'
            ]);

            $currentProduct = Product::find($request->id);
            $currentProduct->name = $request->name;
            $currentProduct->price = $request->price;
            $currentProduct->quantity = $request->quantity;
            $currentProduct->description = $request->description;
            $currentProduct->category_id = $request->category_id;

            if ($request->has('imagepath')) {
                $path = $request->imagepath->move(
                    'uploads',
                    str::uuid()->tostring() . '-' . $request->imagepath->getClientOriginalName()
                );
                $currentProduct->imagepath = $path;
            }

            $currentProduct->save();
            return redirect('/product');
        }

        #####################newProduct#############
        else {
            $request->validate([
                'name' => 'required|max:100|unique:Products',
                'price' => 'required|integer',
                'quantity' => 'required|integer',
                'description' => 'required',
                'imagepath' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            ]);



            $newProduct = new Product();
            $newProduct->name = $request->name;
            $newProduct->price = $request->price;
            $newProduct->quantity = $request->quantity;
            $newProduct->description = $request->description;
            $newProduct->category_id = $request->category_id;

            $path = $request->imagepath->move(
                'uploads',
                str::uuid()->tostring() . '-' . $request->imagepath->getClientOriginalName()
            );
            $newProduct->imagepath = $path;


            $newProduct->save();
            return redirect('/addproduct');
        }
    }
    public function RemoveProduct($productid = null)
    {
        if ($productid != null) {
            $currentProduct = Product::find($productid);
            $currentProduct->delete();
            return redirect('/product');
        } else {
            abort(403, 'plase enter product id in route');
        }
    }

    public function EditProduct($productid = null)
    {
        if ($productid != null) {
            $currentProduct = Product::find($productid);
            if ($currentProduct == null) {
                abort(403, 'can not find this product ');
            }
            $allcategories = Category::all();

            $qrcode=Qrcode::size(200)->generate('Www.AureCode.com');

            $barcode1= new DNS1D();
            $barcode=$barcode1->getBarcodeHTML('01069873026','C39');
            



            return view('product.editproduct', 
            ['product' => $currentProduct, 'allcategories' => $allcategories, 'qrcode'=>$qrcode,'barcode'=>$barcode]);
        } else {
            return redirect('/addproduct');
        }
    }

    public function ProductsTable()
    {
        $products = Product::all();
        return view('product.ProductsTable', ['products' => $products]);
    }

    public function AddProductImages($productid)
    {

        $product = Product::find($productid);
        $productImages = ProductPhoto::where('product_id', $productid)->get();

        return view('product.AddProductImage', ['product' => $product, 'productImages' => $productImages,'productid'=>$productid]);
    }

    public function removeproductphoto($imageid = null)
    {
        if ($imageid != null) {
            $Photo = ProductPhoto::find($imageid);
            $Photo->delete();
            return redirect('/ProductsTable');
        } else {
            abort(403, 'plase enter product image id in route');
        }
    }

    public function storeproductimage(Request $request)
    {

        $request->validate([
            'product_id' => 'required',
            'imagepath' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $photo = new ProductPhoto();
        $photo->product_id = $request->product_id;

        if ($request->has('imagepath')) {
            $path = $request->imagepath->move(
                'uploads',
                str::uuid()->tostring() . '-' . $request->imagepath->getClientOriginalName()
            );
            $photo->imagepath= $path;
        }


        $photo->save();

        return redirect('/product');
    }

     public function showProduct($productid)
    {
        $product = Product::with('category','ProductPhoto')->find($productid);

        $relatedProducts=Product::where('category_id',$product->category_id)->where('id','!=',$productid)
        ->inRandomOrder()->limit(3)->get();

        $category=Category::all();

        return view('product.showproduct', ['product' => $product,'relatedProducts'=>$relatedProducts]);
    }
}
