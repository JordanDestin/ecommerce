@extends('layouts.app')

@section('content')

<div class="container">
  <div class="mt-3">
    <h2>Produits</h2>
    {{--<div class="row">
      @foreach($products as $product)
      <div class="col-md-4">
        <div class="card mb-4 box-shadow d-block mx-auto shadow bg-white">
          <img class="card-img-top" src="{{asset('images/thumbs/' .$product->image  ) }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="">{{ $product->title }}</h5>
            <p class="card-text">{{$product->description}}</p>
            <p class="text-center"><strong>{{$product->getPrice() }} € TTC</strong></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                  <a href="{{ route('products.show',$product->id) }}">View</a>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
              </div>
              <small class="text-muted">9 mins</small>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>--}}

    
    <div class="row">
      @foreach($products as $product)
      <div class="col-sm-4 col-lg-3"> 
        <div class="single-publication card box-shadow">
            <figure>
                <a href="{{ route('products.show',$product->id) }}">
                  <img class="card-img-top" src="{{asset('images/thumbs/' .$product->image  ) }}" alt="Card image cap">
                </a>
            </figure>

            <div class="publication-content">
                <span class="category">Book</span>
                <h3><a href="{{ route('products.show',$product->id) }}">{{ $product->title }}</a></h3>
                <h4 class="price">{{$product->getPrice() }} € TTC</h4>
            </div>
            <div class="add-to-cart">
                <a href="{{ route('products.show',$product->id) }}" class="default-btn">Ajouter au panier</a>
            </div>
        </div>
      </div>
      @endforeach
    </div>



  </div>
  <div class="col-lg-12">
    {{ $products->appends(request()->input())->links() }}
   </div>
</div>
  
  

@endsection



