@extends('layouts.app')

@section('content')

<div class="container ">
  <div  class="row">
    
      @foreach($products as $product)
      <div class="col-lg-3 cards">
        <div class="card cardproduct">

            <a href="{{ route('products.show',$product->id) }}">
          <div class="card-image">
          
            <img src="{{ $product->image }}" alt="">
          
          </div>          
          <div class="card-content center-align">
            <p><strong>{{$product->getPrice() }} € TTC</strong></p>
            <p>
              @foreach ($product->categories as $category)
                  {{$category->name}}
              @endforeach
            </p>
            <p>{{ $product->title }}</p>
          </div>
        </a>
        </div>
      </div>
        @endforeach
        {{ $products->appends(request()->input())->links() }}
  </div>

</div>
@endsection

@section('javascript')

@endsection
