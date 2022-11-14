<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products']= Product::all();
        return view('products.products',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories']   =Category::dropDownList();
        $this->data['mode']         ='Add';
        $this->data['headline']     ='New Produt';
        
        return view('products.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $formData   = $request->all();
        if(Product::create($formData)){
            Session::flash('msg','Product Created Successfully');
        }
        return redirect()->to('products'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product']=Product::findOrFail($id);
        return view('products.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['mode']         =   'edit';
        $this->data['headline']     =   'Update Product';
        $this->data['product']      =   Product::findOrFail($id);
        $this->data['categories']   =   Category::dropDownList();
        
        return view('products.form',$this->data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
         $product=Product::find($id);
         $product['title']=$request->title;
         $product['category_id']=$request->category_id;
         $product['description']=$request->description;
         $product['cost_price']=$request->cost_price;
         $product['price']=$request->price;
         if($product->save()){
            Session::flash('msg','Product Updated Successfully!');
         }
         return redirect()->to('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Product::destroy($id)){
            Session::flash('msg','Product Deleted Successfully!');
        }
        return redirect()->to('products');
    }
}
