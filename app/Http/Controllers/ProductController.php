<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{ public function showProduct()
    {
        $data = DB::table("products")->get();
        return view('product.showProduct',['products'=>$data]);
    } 

    public function addProduct(){
        return view('product.addProduct');
    }

    public function postProduct(Request $req){
        // dd($req);
       $validated=$req->validate([
            "description"=>'required',
           "quantity"=>'required',
           "price"=>'required',
            
           
        ]);

        // dd($validated);
        $data=Product::create($validated);
        return redirect("products")->with('success', 'A product has been added!');
    
    }

    public function editProduct($id){
        $product=Product::findOrFail($id);
        return view('product.editProduct',['product'=>$product]);
        //return redirect('/products')-> with('success', 'A product has been edited successfully!');
     }
 
     public function updateProduct(Request $req){
        $validated=$req->validate([
            "description"=>'required',
            "quantity"=>'required',
            "price"=>'required',
             
         ]);
             $data=Product::find($req->id);
             $data->description=$req->description;
             $data->quantity=$req->quantity;
             $data->price=$req->price;
             $data->save();
             return redirect('/products')-> with('success', 'A product has been edited');
 
 
         
 
     }

     public function deleteProduct($id){
        $product = DB::table('products')
        ->where('id', $id)
        ->delete();
        return redirect('/products')-> with('success', 'A product has been deleted');
    }
}
