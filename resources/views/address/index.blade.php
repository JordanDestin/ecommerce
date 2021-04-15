@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Addresse de Livraison</div>
            <div class="card-body">
                <form class="w-100" method="POST" action="@isset($addresses) {{route('address.store')}} @else {{route('address.store')}} @endisset">
                    @csrf
                    <div class="mb-3">
                        <label for="address">Addresse</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Addresse" @isset($addresses) value="{{ $addresses->address }}" @else value="" @endisset required>
                     
                    </div>
        
                    <div class="mb-3">
                        <label for="address2">Complément d'addresse</label>
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Complément d'addresse"  @isset($addresses) value="{{ $addresses->addressbis }}" @else value="" @endisset>
                    </div>
        
                    <div class="row">
                        <div class="col-md-6 mb-3">
                        <label for="country">Ville</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Ville"  @isset($addresses) value="{{ $addresses->city }}" @else value="" @endisset required>
                  
                        </div>
    
                        <div class="col-md-6 mb-3">
                        <label for="zip">Code Postal</label>
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Code Postal" @isset($addresses) value="{{ $addresses->postal }}" @else value="" @endisset required>
        
                        </div>
                    </div>        
                    <div class="mb-3">
                        <label for="phone">Téléphone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Téléphone"  @isset($addresses) value="{{ $addresses->phone }}" @else value="" @endisset required>
                    
                    </div>        
                    <div class="row mb-0">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                Enregistrer
                            </button>
                        </div>
                    </div>
                    <hr class="mb-4">
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
                        <a href="{{route('address.index')}}">Commander</a>
                    </button>
                @endif
                </div>
            </div>

        </div>

    </div>
    
    <hr class="mb-4">
</div>
    
@endsection