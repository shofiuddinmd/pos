<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Auth;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Product;

class ProductController extends Controller
{
    public function view(){
        $allData = Product::all();
        return view('backend.product.product-view',compact('allData'));
    }
    public function add(){
        $data['suppliers'] = Supplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();
        return view('backend.product.product-add',$data);
        //return view('backend.product.product-add',compact('suppliers','units'));  Alternetive system
    }
    public function store(Request $request){
        $product = new Product();
        $product->supplier_id           = $request->supplier_id;
        $product->unit_id               = $request->unit_id;
        $product->category_id           = $request->category_id;
        $product->name                  = $request->name;
        $product->quantity              = '0';
        $product->created_by            = Auth::user()->id;
        $product->unit_price            = $request->unit_price;
        $product->save();
        return redirect()->route('products-view')->with('success','Data saved successfully');
    }
    public function edit($id){
        $data['editData'] = Product::find($id);
        $data['suppliers'] = Supplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();
        return view('backend.product.product-edit',$data);
    }
    public function update(Request $request, $id){
        $product                        = Product::find($id);
        $product->supplier_id           = $request->supplier_id;
        $product->unit_id               = $request->unit_id;
        $product->category_id           = $request->category_id;
        $product->name                  = $request->name;
        $product->updated_by            = Auth::user()->id;
        $product->unit_price            = $request->unit_price;
        $product->save();
        return redirect()->route('products-view')->with('success','Updated Successfully');
    }
    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products-view')->with('success', 'Data deleted successfully');
    }
}
