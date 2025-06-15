<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    function index(){
        
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function store(Request $request){

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
        ]);

        
        try {
            $product = Product::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'category' => $data['category'],
            ]);
            Log::info('Product created successfully: ' . $product->name);
            return redirect()->route('addProduct')->with('success', 'Product created successfully.');
        } 
        catch (\Exception $e) {
            Log::error('Product creation failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to create product.');
    }
    }




     function show($id){
        // This method should return a view with the details of a specific product
        $product = Product::findOrFail($id);
        return view('updateProduct', compact('product'));
    }

     function edit($id){
        // This method should return a view with a form to edit an existing product
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

     function update(Request $request, $id){
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
     function destroy($id){
        // This method should handle the logic to delete a product
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
  
}
