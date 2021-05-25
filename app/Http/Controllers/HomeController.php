<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();

        //dd($products);
       // return view('products.index')->with('products', $products);

       return view('home', array(
        'products' => $products
    ));
      //  return view('home');
    }
}
