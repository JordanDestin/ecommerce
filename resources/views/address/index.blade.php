@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Addresse de Livraison</div>
            <div class="card-body">
                <form class="w-100" method="POST" action="@isset($addresses) {{route('address.store')}} @else {{route('address.store')}} @endisset">
                    @csrf
                    <x-addresse :addresse="$addresses"/>
                </form>
            </div>
        </div>
    </div>

    <div class="col s4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Récapitulatif</span> 
                <br>
                <div class="row">
                    <div class="col s6">
                    Sous Total
                    </div>
                    <div class="col s6">
                    <strong>{{getprice(Cart::subtotal())}} €</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                    Taxe
                    </div>
                    <div class="col s6">
                    <strong>{{getprice(Cart::tax())}} €</strong>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col s6">
                    Total TTC (hors livraison)
                    </div>
                    <div class="col s6">
                    <strong>{{getprice(Cart::total())}} €</strong>
                    </div>
                </div>
                <div class="col-12 mt-2 text-center">
                    @if(Cart::total())
                        
                    <button type="submit" class="btn btn-primary">
                        <a href="{{route('payment.index')}}">Commander</a>
                    </button>
                @endif
                </div>
            </div>

        </div>

    </div>
    
    <hr class="mb-4">
</div>
    
@endsection