@extends('layouts.app')

@section('content')

<div class="container card">
  <h3>{{$product->title}}</h3>
  <div class="row row-cols-2">
    <div class="col"><img src="{{asset('images/thumbs/' .$product->image  ) }}"></div>
    <div class="col">
      <h4>{{ $product->name }}</h4>
      <p>{{ $product->description }}</p>
      <p class="text-center"><strong>{{$product->getPrice() }} € TTC</strong></p>
      <form  method="POST" action="{{ route('cart.store') }}">
        @csrf
        <div class="input-field col">
          <input type="hidden" name="product_id" value="{{ $product->id }}">       
          <p>
            <button class="btn btn-light btncustom" style="width:100%" type="submit" id="addcart">Ajouter au panier
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
