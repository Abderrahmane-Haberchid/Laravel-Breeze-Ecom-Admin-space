<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function store(Request $request){

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
        ]);

        
        Product::create($data);
        console.log('Product created successfully: ' . $data['name']);

        return redirect()->route('addProduct')->with('success', 'Product created successfully.');
    }




    private function show($id){
        // This method should return a view with the details of a specific product
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    private function edit($id){
        // This method should return a view with a form to edit an existing product
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    private function update(Request $request, $id){
        // This method should handle the logic to update an existing product
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
    private function destroy($id){
        // This method should handle the logic to delete a product
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
  
}
