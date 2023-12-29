<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function index(){
        //return view('products.index',[ 'products'=>Product::latest()->get() ]);   
        //latest()-> (this code for listing from latest element)
        
        //FOR PAGINATIONS 
        return view('products.index',[ 'products'=>Product::latest()->paginate(5) ]);
    }
    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        //dd($request->all()); (dd does what data should be going to be store in DB)
        //dd($request->image);
        //for validating data
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file type and size limits as needed
        ]);

        //FOR IMAGE UPLOAD
    //    if(isset($request->image)){
    //    $imageName = time() . '.' . $request->image->extension();
    //    $request->image->move(public_path('products'), $imageName);  
    //    $product->image =$imageName;      
    //   }
    
     if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);
       
    }

        $product = new product;
        $product->image = 'ram'; //DEFAULT VALUE OF IMAGE
        $product->name = $request->name;
        $product->description = $request->description;

        $product-> save();

        return redirect('/home')->withSuccess('Product Created !!!');
    }


    public function edit($id){
        //dd($id);

        //FOR DATA FETCHING
        $product = Product::where('id',$id)->first();

        return view ('products.edit',['product' =>$product]);
    }


    public function update(Request $request, $id){
        //dd($id);
         //for validating data
         $request->validate([
            'name'=> 'required',
            'description'=> 'required',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file type and size limits as needed
        ]);
        $product = Product::where('id',$id)->first();

        //FOR IMAGE UPLOAD
        if(isset($request->image)){
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);  
        $product->image =$imageName;      
       }
    
        //$product->image = 'ram';   (DEFAULT VALUE OF IMAGE)
        $product->name = $request->name;
        $product->description = $request->description;

        $product-> save();

        return redirect('/home')->withSuccess('Product Updated !!!');
    }

//FOR DELETING DATA
    public function destroy($id){
        $product = Product::where('id',$id)->first();
        $product->delete();

        return back()->withSuccess('Product Deleted !!!');
    }
//FOR VIEWING THE DATA
    public function show($id){
        $product = Product::where('id',$id)->first();
        
        return view('products.show',['product'=>$product]);
    }
}
