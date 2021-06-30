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
      $tendanceProducts = Product::where('tendance',1)->with('categories')->get();

      $newProducts = Product::orderBy('created_at','desc')->limit(8)->get();

      return view('home', array(
        'products' => $tendanceProducts,
        'newproducts' =>$newProducts
    ));
      //  return view('home');
    }
}
