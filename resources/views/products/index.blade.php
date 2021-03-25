@extends('layouts.app')

@section('content')


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="..." alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container ">
  <div  class="row">
      @foreach($products as $product)
      <div class="col-lg-3 cards mb-3">
        <div class="card cardproduct">
            <a href="{{ route('products.show',$product->id) }}">
          <div class="card-image">
            <img src="{{ $product->image }}" alt="">
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

