<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
       if(request()->categorie) 
        {
            $products = Category::find(request()->categorie)->products()->paginate(8);
        } 
        else 
        {
            $products = Product::paginate(8);
        }
        return view('products.index')->with('products', $products);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', array(
            'product' => $product
        ));
    }

    public function search ()
    {
        $q = request()->input('q');

        $products =  Product::where('title','Like',"%$q%")
                ->orWhere('description','Like',"%$q%")
                ->paginate(8);
        return view('products.search')->with('products', $products);
    }
    
    
    
    
}
