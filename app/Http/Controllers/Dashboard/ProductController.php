<?php

namespace App\Http\Controllers\Dashboard;
use  App\Models\Product;

use  App\Http\Requests\Product\CreateProductRequest;
use  App\Http\Requests\Product\EditProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $products =  Product::paginate(10);
       return view('product.products')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('product.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
       $data = $request->validated();

       $product = new product;

       $product->name =  $data['name'];
       $product->price =  $data['price'];
       $product->description =  $data['description'];

       if($request->hasFile('image')){
        $file = $request->file('image');
        $ext = $file ->getClientOriginalExtension();
        $fileName = time().'.'.$ext;
        $path = 'uploads/product/';
        $file->move($path,$fileName);
        $product->image =  $path.$fileName;
       }
       $product->save();
       return  redirect('dashboard/products')
       ->with('msg','New product created successfully ! ') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       return view('product.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
       $data = $request->validated();
       
       $product =  Product::findOrFail($id);

       $product->name =  $data['name'];
       $product->price =  $data['price'];
       $product->description =  $data['description'];

       if($request->hasFile('image')){
        $path =  $product->image;
        if(File::exists($path))File::delete($path);
        $file = $request->file('image');
        $ext = $file ->getClientOriginalExtension();
        $fileName = time().'.'.$ext;
        $path = 'uploads/product/';
        $file->move($path,$fileName);
        $product->image =  $path.$fileName;
       }
       $product->update();
       return  redirect('dashboard/products')
       ->with('msg','Product updated successfully ! ');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $path =  $product->image;
      if(File::exists($path))File::delete($path);
      $product->delete();
      return  redirect('dashboard/products')
      ->with('msg','Product deleted successfully ! ');
   
    }
}
