<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
   
   public function index () {
      
      $products = Product::all();
      return $products;
      
   }
   
   public function show ($id) {
      
      $product = Product::find($id);
      return $product;
      
   }
   
   public function store (Request $request) {
      
      $request->validate([
         'name' => 'required',
         'description' => 'required',
         'brand' => 'required',
         'quantity' => 'required',
      ]);
      
      $product = new Product;
      
      $product->name = $request->name;
      $product->description = $request->description;
      $product->brand = $request->brand;
      $product->quantity = $request->quantity;
      $product->save();

      return response("Created", 200);
      
   }
   
   public function update ($id, Request $request) {
      
      $request->validate([
         'name' => 'required',
         'description' => 'required',
         'brand' => 'required',
         'quantity' => 'required',
      ]);
      
      $product = Product::find($id);
      
      $product->name = $request->name;
      $product->description = $request->description;
      $product->brand = $request->brand;
      $product->quantity = $request->quantity;
      $product->save();
      
      return response("Updated", 200);
      
   }
   
   public function delete ($id) {
      
      $product = Product::find($id);
      $product->delete();
      
      return response("Deleted", 200);
      
   }
    
    
}