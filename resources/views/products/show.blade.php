@extends('layouts.app')

@section('content')
<div class="container">
  <div class=row>
    <div class="col s12 m6">
      <img src="{{asset('images/thumbs/' .$product->image  ) }}">
    </div>
    <div class="col s12 m6">
      <h4>{{ $product->name }}</h4>
      <p><strong> € TTC</strong></p>
      <p>{{ $product->description }}</p>
      <form  method="POST" action="{{ route('cart.store') }}">
        @csrf
        <div class="input-field col">
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <label for="quantity">Quantité</label>        
          <p>
            <button class="btn waves-effect waves-light" style="width:100%" type="submit" id="addcart">Ajouter au panier
              <i class="material-icons left">add_shopping_cart</i>
            </button>
          </p>    
        </div>    
      </form>
    </div>
  </div>

</div>
@endsection

@section('javascript')

@endsection
