<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
       if (request()->categorie) 
        {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->categorie);
            })->paginate(8);
        } 
        else 
        {
            $products = Product::with('categories')->paginate(8);
        }
        //$products = Product::all();

        return view('products.index')->with('products', $products);

       /* return view('products.index', array(
            'products' => $products
        ));*/
    }

    public function show($id)
    {
        $product = Product::where('id',$id)->firstOrFail();

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
