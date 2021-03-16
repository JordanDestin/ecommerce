<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::count() <= 0)
        {
            return redirect()->route('home');
        }
        else
        {
            // Création d'une intention de paiement https://stripe.com/docs/payments/accept-a-payment?ui=elements
            $stripe = new \Stripe\StripeClient("sk_test_51IOTzuLWaP0SswbJ7D7AB2DyEXdk4Z2v07iTp2HY8jqLLQaEWJMtwnFBuMExAgPYOhVgvjagOzKuHo7CFAC4sZ8x00XOEENHQi");

            $intent= $stripe->paymentIntents->create([
                'amount' => round(Cart::total()),
                'currency' => 'eur',
        
            ]);

            //Grâce à l'helper Arr::get on va récupéré la clef secrete
            $clientSecret = Arr::get($intent,'client_secret');
       
            return view('payment.index', array(
                'clientSecret' => $clientSecret
            ));
        }
        
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
        $data = $request->json()->all();

        $order = new Order();
        
        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['amount'];

        $order->payment_created = (new DateTime())->setTimesTamp($data['paymentIntent']['created'])->format('y-m-d H:i:s');

        $product = [];

        $i = 0;

        foreach(Cart::content() as $product)
        {
            $product['product_' . $i][] = $product->model->title;
            $product['product_' . $i][] = $product->model->price;
            $product['product_' . $i][] = $product->qty;
            $i++;
        }

        $order->products = serialize($product);
        $order->user_id = 15;
        $order->save();

        if($data['paymentIntent']['status'] == 'succeeded')
        {
            Cart::destroy();
            return response()->json(['success' => 'Payment Intent Succeeded']);
        }
        else
        {
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
        }

        
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
