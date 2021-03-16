@extends('layouts.app')

@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
<div class="col-md-12">
    <a href="{{ route('cart.index') }}" class="btn btn-sm btn-secondary mt-3">Revenir au panier</a>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h4 class="text-center pt-5">Procéder au paiement</h4>
            <form action="{{ route('checkout.store') }}" method="POST" class="my-4" id="payment-form">
                @csrf
                <div id="card-element">
                <!-- Elements will create input elements here -->
                </div>

                <!-- We'll put the error messages in this element -->
                <div id="card-errors" role="alert"></div>

                <button class="btn btn-success btn-block mt-3" id="submit">
                    <i class="fa fa-credit-card" aria-hidden="true"></i> Payer maintenant ({{ getPrice(Cart::total()) }})
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
    <script>
        // Set your publishable key: remember to change this to your live publishable key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        var stripe = Stripe('pk_test_51IOTzuLWaP0SswbJZKcLFkKd8nC6Hxjm18j0lVI5EKXCwt1lVvQD0NSaGCz3o2aau2MkYt1qP1lHQ8kqYJNSzZ9100sYn0MwUP');
        var elements = stripe.elements();

        var style = {
                base: {
                    color: "#32325d",
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: "antialiased",
                    fontSize: "16px",
                    "::placeholder": {
                        color: "#aab7c4"
                    }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };
        var card = elements.create("card", { style: style });

        card.mount("#card-element");

        card.addEventListener('change', ({error}) => {
            let displayError = document.getElementById('card-errors');
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = '';
            }
        });
        
        var form = document.getElementById('payment-form');
        var submitbutton = document.getElementById('submit');

        form.addEventListener('submit', function(ev) {
        ev.preventDefault();
        // ON désactive le boutton pour éviter de cliquer plusieur fois dessus lors de la soumission
        submitbutton.disabled = true;
        // If the client secret was rendered server-side as a data-secret attribute
        // on the <form> element, you can retrieve it here by calling `form.dataset.secret`
        stripe.confirmCardPayment("{{$clientSecret}}", {
            payment_method: {
                card: card
            }
        }).then(function(result) {
            if (result.error) {
                submitbutton.disabled = false;
            // Show error to your customer (e.g., insufficient funds)
            console.log(result.error.message);
            } 
            else
            {
            // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    var paymentIntent = result.paymentIntent;
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    var url = form.action; 
                    var redirect = '/merci';
                    fetch(
                        url,
                        {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept" : "application/json, text-plain, */*",
                                "X-Requested-With" : "XMLHttpRequest",
                                "X-CSRF-Token" : token
                            },
                            method: 'POST',
                            body: JSON.stringify({
                                paymentIntent : paymentIntent
                            })
                        }
                    ).then((data) => {
                        //form.reset();
                       // window.location.href = redirect;
                    })
                    .catch((error) => {
                        console.log(error);
                    })


                }
            }
        });
        });
    </script>
@endsection
