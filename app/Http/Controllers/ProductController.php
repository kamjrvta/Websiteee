<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{ public function index()
    {
        $data = DB::table("products")->get();
        return view('product.index',['products'=>$data]);
    } 

    public function addProduct(){
        return view('product.addProduct');
    }

    public function saveProduct(Request $req){
        // dd($req);
       $validated=$req->validate([
            "description"=>'required',
           "quantity"=>'required',
           "price"=>'required',
            
           
        ]);

        // dd($validated);
        $data=Product::create($validated);
        return redirect("/products")->with('success', 'A product has been added!');
    
    }

    public function editProduct($id){
        $data=Product::findOrFail($id);
        return view('product.editProduct',['product'=>$data]);
        return redirect('/products')-> with('success', 'A product has been edited successfully!');
     }
 
     public function updateProduct(Request $req){
         $req->validate([
            "description"=>'required',
            "quantity"=>'required',
            "price"=>'required',
             
         ]);
             $data=Product::find($req->id);
             $data->description=$req->description;
             $data->quantity=$req->quantity;
             $data->price=$req->price;
         
 
             $data->save();
             return redirect('/')-> with('success', 'A product has been edited successfully!');
 
 
         
 
     }

     public function delete($id){
        $delete = DB::table('products')
        ->where('id', $id)
        ->delete();
        return redirect('/products')-> with('success', 'A record has been deleted!');
    }
}
