<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // On vérifier si le produit est déja dans notre panier
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->product_id;
        });

        if ($duplicata->isNotEmpty())
        {
            return redirect()->route('products.index')->with('success', 'Le produit a déja été ajouté.');
        }

        // On rajoute le produit dans notre panier
        $product = Product::find($request->product_id);

        Cart::add($product->id, $product->title, 1, $product->price )
        ->associate('App\Models\Product');

        return back()->with('success', 'Le produit a bien été ajouté.');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        $data = $request->json()->all();

        $validate = validator::make($request->all(), [
           'qty' => 'required|numeric|between:1,10' 
        ]);

        if($validate->fails())
        {
            Session::flash('danger', 'La quantité du produit ne doit pas dépasser 10.');

            return response()->json(['error' => 'Cart Quantity has not been updated']);
        }

        Cart::update($rowId, $data['qty']);

        Session::flash('success', 'La quantité a été mise à jour');

        return response()->json(['success' => 'Cart Quantity has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return back()->with('success' , 'L\'article à bien été supprimer');
    }
}
