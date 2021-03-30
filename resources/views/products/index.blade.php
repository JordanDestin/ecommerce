@extends('layouts.app')

@section('content')

<div class="container ">
  <div  class="row">
      @foreach($products as $product)
      <div class="col-lg-4 cards mb-3">
        <div class="card cardproduct">
            <a href="{{ route('products.show',$product->id) }}">
          <div class="card-image">
            <img src="{{asset('images/thumbs/' .$product->image  ) }}">
          </div>          
          <div class="card-content text-center">
            <h5 class="">{{ $product->title }}</h3>
            <p class="productprice"><strong>{{$product->getPrice() }} € TTC</strong></p>
          </div>
        </a>
        </div>
      </div>
        @endforeach
        
  </div> 
  <div class="col-lg-12">
   {{ $products->appends(request()->input())->links() }}
  </div>
</div>
@endsection

