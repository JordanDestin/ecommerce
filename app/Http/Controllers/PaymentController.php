<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Order;
use App\Models\User;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


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
          /*  $stripe = new \Stripe\StripeClient(config('stripe.secret_key'));

            $intent= $stripe->paymentIntents->create([
                'amount' => round(Cart::total()),
                'currency' => 'eur',
        
            ]);
dd($intent);*/
            //Grâce à l'helper Arr::get on va récupéré la clef secrete

            // Set your secret key. Remember to switch to your live secret key in production.
            // See your keys here: https://dashboard.stripe.com/apikeys
            \Stripe\Stripe::setApiKey(config('stripe.secret_key'));

            $intent = \Stripe\PaymentIntent::create([
                'amount' => round(Cart::total()),
                'currency' => 'eur',
            ]);
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
       // dd($request->user());

        $user = $request->user();

        // Enregistrement commande
        $order = $user->orders()->create([
            'payment_intent_id' => $data['paymentIntent']['id'],
            'amount' => $data['paymentIntent']['amount'],
            'payment_created' => (new DateTime())->setTimesTamp($data['paymentIntent']['created'])->format('y-m-d H:i:s'),
           // 'user_id' => $request->payment,
        
        ]);
      //  $order = new Order();


    foreach(Cart::content() as $product)
    {
        $order->products()->create([
            'title' => $product->name,
            'quantite' => $product->qty,
            'price' => $product->price
        ]);
       // $order->payment_intent_id = $data['paymentIntent']['id'];
    }
        if($data['paymentIntent']['status'] == 'succeeded')
        {
            Cart::destroy();
            Session::flash('success','Votre commande à été traitée avec succes');
            return response()->json(['success' => 'Le paiement à réussi']);
            //return back()->with('success', 'Le paiement à réussi.');
        }
        else
        {
            return response()->json(['error' => 'Le paiement à échoué']);
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
